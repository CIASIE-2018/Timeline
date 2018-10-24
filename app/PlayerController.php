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
    private $order = 0;
	private $turn = false;

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

    public function setOrder($order){
		$this->order = $order;
    }

    public function getOrder(){
		return $this->order;
    }

	public function getTurn(){
		return $this->turn;
	}

	public function setTurn($turn){
		$this->turn = $turn;
	}

    public function selectCardFromHand(){
	//selectionne une carte de la main (retourne la carte choisie)
    }

	public function selectIndex(){
		//selectionne un index auquel positionner sa carte
	}

}
