<?php

namespace App\Controllers;
include 'RoomController.php';

use Slim\Views\Twig as View;

class roomCreate extends Controller {
    public function roomCreate($req, $res){
        $theme = 'Cinéma';
		$creator = 'bob';
		/*$bdd = mysqli_connect('localhost', 'login', 'mdp', 'nom');
		$query = mysqli_prepare($bdd, 'INSERT INTO Salon(libSalon, creator, theme) VALUES(?,?,?)');
		mysqli_stmt_bind_params($query, sss, "Salon de ".$creator, $creator, $theme);*/
		if($theme == 'Cinéma'){
            return $this->view->render($res, 'salonCine.twig');
		}
		else if($theme == 'Général'){
            return $this->view->render($res, 'salonGeneral.twig');
		}
		else if($theme == 'Sport'){
            return $this->view->render($res, 'salonSport.twig');
		}
		/*exit;
        mysqli_free_resutlt($query);*/
        
    }
}