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
            for($j = 0; $j < count($players); $j++){
                $cardHand = rand(0, count($this->deck));
                $this->players[$j]->addToHand($this->deck[$cardHand]);
            }
        }
        $this->addToLine($this->deck[count($this->deck)]);
        $this->isFinished = false;
    }
}