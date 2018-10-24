<?php

namespace App\Controllers;

use Slim\Views\Twig as View;

class GameController extends Controller {

    private $idGame;
    private $isFinished;
    private $deck;
    private $theme;
    private $players;
    private $turn;
    private $timeline = [];

    public function GameController($id, $theme, $players){
        $bdd = mysqli_connect('localhost', 'login', 'password', 'name');
        $query = mysqli_prepare($bdd, 'SELECT * FROM Carte WHERE theme ='.$theme);
        mysqli_stmt_execute($query);
        mysqli_bind_result($query, $data[idCard], $data[date], $data[event], $data[theme], $data[img]);
        while(mysqli_stmt_fetch($query)){
            $cardDeck = new CardController($data[idCard], $data[date], $data[event], $data[theme], $data[img]);
            array_push($this->deck, $cardDeck);
        }
        $this->theme = $theme;
        $this->idGame = $id;
        $this->turn = 0;
        $this->players = $players;
        for($i = 1; $i < 5; $i++){
	    $this->players[$i]->setTurn($i);
            for($j = 0; $j < count($players); $j++){
                $cardHand = rand(0, count($this->deck));
                $this->players[$j]->addToHand($this->deck[$cardHand]);
            }
        }
        array_push($this->timeline, $this->deck[count($this->deck)-1]);
        $this->isFinished = false;
    }

    public function drawCard($player){
        $player->addToHand($this->deck[count($this->deck)-1]);
    }

    public function getTimeline(){
	return $this->$timeline();
    }    

    public function playCard($player, $card, $index){
		if($player->getTurn() == true){
	    	if($index <= 0){
				if(($this->timeline[0]->getDate()) <= $card->getDate()){
					array_splice($this->timeline, 0, 0, $card);
				}
				else{
					$player->addToHand($this->deck[count($this->deck)]);
				}
	    	}
	   		else if($index >= $this->timeline[count($this->timeline)]){
				if(($this->timeline[count($this->deck)-1]) <= $card->getDate()){
					array_push($this->timeline, $card);
				}
				else{
					$player->addToHand($this->deck[count($this->deck)-1]);
				}
	    	}
	    	else{
				if(($this->timeline[$index-1]->getDate()) <= $card->getDate() && ($this->timeline[$index+1]->getDate()) >= $card->getDate()){
					array_splice($this->timeline, $index, 0, $card);
				}
				else{
					$player->addToHand($this->deck[count($this->deck)-1]);
				}
			}
		}
		$this->removeFromHand($card);
    }

}
