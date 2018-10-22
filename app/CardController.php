<?php

namespace App\Controllers;

use Slim\Views\Twig as View;

Class CardController extends Controller{

    private $idCard;
    private $date;
    private $event;
    private $theme;
    private $img;

    public function CardController($id, $date, $event, $theme, $img){
        $this->idCard = $id;
        $this->date = $date;
        $this->event = $event;
        $this->theme = $theme;
        $this->img = $img;
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