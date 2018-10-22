<?php

namespace App\Controllers;

use Slim\Views\Twig as View;

class PlayerController extends Controller {

    private $idPlayer;
    private $login;
    private $password;
    private $nbWins;
    private $nbLoss;
    private $nbGames;
    private $score;
    private $hand = null;

    public function PlayerController($id, $log, $mdp, $wins, $loss, $games, $score){
        $this->idPlayer = $id;
        $this->login = $log;
        $this->password = $mdp;
        $this->nbWins = $wins;
        $this->nbLoss = $loss;
        $this->nbGames = $games;
        $this->score = $score;
    }

    public function getLogin(){
        return $this->login;
    }

    public function getNbWins(){
        return $this->nbWins;
    }

    public function getNbLoss(){
        return $this->nbLoss;
    }

    public function getNbGames(){
        return $this->nbGames;
    }

    public function getScore(){
        return $this->score;
    }

    public function getHand(){
        return $this->hand;
    }

    public function addToHand($card){
        return $this->hand.=$card;
    }

    public function setScore($points){
        $this->score+=$points;
    }

    public function setNbWins(){
        $this->nbWins++;
    }

    public function setNbLoss(){
        $this->nbLoss++;
    }

    public function setNbGames(){
        $this->nbGames++;
    }

    public function playCard($card, $index){
        //placer $card dans la timeline à l'index $index
        //retirer $card de $this->hand
    }
}
