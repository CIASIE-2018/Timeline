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
    
    $user = "";
    $password = "";
    $database = "";

    public function GameController($id, $theme, $players){
        $bdd = mysqli_connect('localhost', $user, $password, $database);
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
        for($nbPlayer = 0; $nbPlayer < count($players); $nbPlayer++){
	    	$this->players[$nbPlayer]->setOrder($i);
			$this->players[$nbPlayer]->setNbGames();
        	for($nbCard = 0; $nbCard < 5; $nbCard++){
                $cardHand = rand(0, count($this->deck));
                $this->players[$nbPlayer]->addToHand($this->deck[$cardHand]);
            }
        }
        array_push($this->timeline, $this->deck[count($this->deck)-1]);
        $this->isFinished = false;
		mysqli_close($bdd);
    }

    public function drawCard($player){
        $player->addToHand($this->deck[count($this->deck)-1]);
    }

    public function getTimeline(){
		return $this->$timeline();
    }    

    public function playCard($player, $card, $index){
		if(isPlayersTurn($player) == true){
	    	if($index <= 0){
				if(($this->timeline[0]->getDate()) <= $card->getDate()){
					array_splice($this->timeline, 0, 0, $card);
					if($player->isHandEmpty()){
						$this->isFinished = true;
						$player->setNbWins();
						return $player->getLogin()." a gagné !";
					}
				}
				else{
					$this->drawCard($player);
				}
	    	}
	   		else if($index >= $this->timeline[count($this->timeline)]){
				if(($this->timeline[count($this->deck)-1]) <= $card->getDate()){
					array_push($this->timeline, $card);
					if($player->isHandEmpty()){
						$this->isFinished = true;
						$player->setNbWins();
						return $player->getLogin()." a gagné !";
					}
				}
				else{
					$this->drawCard($player);
				}
	    	}
	    	else{
				if(($this->timeline[$index-1]->getDate()) <= $card->getDate() && ($this->timeline[$index+1]->getDate()) >= $card->getDate()){
					array_splice($this->timeline, $index, 0, $card);
					if($player->isHandEmpty()){
						$this->isFinished = true;
						$player->setNbWins();
						return $player->getLogin()." a gagné !";
					}
				}
				else{
					$this->drawCard($player);
				}
			}
		}
		$this->removeFromHand($card);
		$player->setTurn(false);
    }

    public function isPlayersTurn($player){
		//retourne si le joueur est actif pendant ce tour (boolean)
		for($i = 0; $i < count($this->players); $i++){
			if($player->getOrder() == $i){
				$player->setTurn(true);
			}
		}
		return $player->getTurn();
    }

	public function playGame(){
		while($this->isFinished != true){
			for($i = 0; $i < count($this->players); $i++){
				$this->turn++;
				$card = $this->players[$i]->selectCardFromHand();
				$index = $this->players[$i]->selectIndex();
				$this->playCard($this->players[$i], $card, $index);
			}
		}
		for($j = 0; $j < count($this->players); $j++){
			if(!$this->players[$j]){
				$this->players[$j]->setNbLoss();
			}
		}
	}

}
