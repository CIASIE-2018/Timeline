<?php

namespace App\Controllers;

use Slim\Views\Twig as View;

Class CardController extends Controller{

    private $idCard;
    private $date;
    private $event;
    private $theme;
    private $img;
    private $revealed = false;

    public function CardController($id, $date, $event, $theme, $img){
      $bdd = mysqli_connect('localhost', 'login', 'password', 'name');
      $query = mysqli_prepare($bdd, 'SELECT * FROM Carte WHERE id = ?');
      msqli_stmt_bind_param($query, "i", $id);
      mysqli_stmt_execute($query);
      mysqli_bind_result($query, $data[id], $data[idTheme], $data[date], $data[event]);
      while(mysqli_stmt_fetch($query){
          $this->idCard = $data[id];
          $this->date = $data[date];
          $this->event = $data[event];
          
          $stmt = mysqli_prepare($bdd, 'SELECT nom FROM Theme WHERE id = ?');
          msqli_stmt_bind_param($tstmt, "i", $data[idTheme]);
          mysqli_stmt_execute($stmt);
          mysqli_bind_result($stmt, $donnees[id], $donnees[nom]);
          while(mysqli_stmt_fetch($stmt){
            $this->theme = $donnees[nom];
          }
      }
      mysqli_close($bdd);
        /*
        $this->idCard = $id;
        $this->date = $date;
        $this->event = $event;
        $this->theme = $theme;
        $this->img = $img;
        */
    }

    public function revealedCard(){
        $this->revealed = true;
	//afficher la date sur la carte
    }

    public function getDate(){
        return $this->date;
    }

    public function getEvent(){
        return $this->event;
    }

    public function getTheme(){
        return $this->theme;
    }

    public function getImg(){
        return $this->img;
    }
}
