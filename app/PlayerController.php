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
    private $handIsEmpty;

    public function PlayerController($id, $log, $mdp, $wins, $loss, $games, $score){
        $this->idPlayer = $id;
        $this->login = $log;
        $this->password = $mdp;
        $this->nbWins = $wins;
        $this->nbLoss = $loss;
        $this->nbGames = $games;
        $this->score = $score;
        $this->handIsEmpty = true;
    }


    public function ajoutercartedanslatimeline($carte, $index) {

        if(array_key_exists($index-1, $timeline))
        {
            $dateSup = $timeline[$index-1] <= $timeline[$index];
        }
    
        if(array_key_exists($index+1, $timeline))
        {
            $positionOK = $dateSup && ($timeline[$index+1] >= $timeline[$index]);
        }
    
        if($positionOK)
        {
            $timeline[$index] = $carte;
            removeFromHand($carte);
        } else {
            removeFromHand($carte);
            drawCard();
        }

    }

    public function removeFromHand($card){
        for($i = 0; $i < count($this->hand); $i++){
            if($this->hand[i].getEvent() == $card.getEvent()){
                unset($this->hand[i]);
            }
        }
    }

    public function isHandEmpty(){
        return count($this->hand) == 0;
    }

    public function setHandEmpty(){
        $this->handIsEmpty = !$this->handIsEmpty;
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
