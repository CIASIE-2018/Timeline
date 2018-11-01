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
    private $score = 0;
    private $hand = null;
    private $handIsEmpty = false;
    private $order = 0;
	  private $turn = false;

    public function PlayerController($log, $mdp){
		$bdd = mysqli_connect('localhost', 'login', 'password', 'name');
		$query = mysqli_prepare($bdd, 'SELECT * FROM Joueur WHERE login = ? AND password = ?');
		msqli_stmt_bind_param($query, "ss", $log, $mdp);
		mysqli_stmt_execute($query);
		mysqli_bind_result($query, $data[idJoueur], $data[login], $data[password], $data[nbWins], $data[nbLoss], $data[nbGames], $data[score]);
		while(mysqli_stmt_fetch($query){
		    $this->idPlayer = $data[idJoueur];
        $this->login = $data[login];
        $this->password = $data[password];
        $this->nbWins = $data[nbWins];
        $this->nbLoss = $data[nbLoss];
        $this->nbGames = $data[nbGames];
			  $this->score = $data[score];
		}
		mysqli_close($bdd);
/*
        $this->idPlayer = $id;
        $this->login = $log;
        $this->password = $mdp;
        $this->nbWins = $wins;
        $this->nbLoss = $loss;
        $this->nbGames = $games; */
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
