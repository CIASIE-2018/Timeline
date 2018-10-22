<?php

namespace App\Controllers;

use Slim\Views\Twig as View;

class ThemeController extends Controller {

    private $idTheme;
    private $name;

    public function ThemeController($id, $name){
        $this->idTheme = $id;
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }
}