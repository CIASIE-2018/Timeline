<?php

namespace App\Controllers;

use Slim\Views\Twig as View;

class RoomController extends Controller {

	public function index ($request, $response)
	{   
		return $this->view->render($response, 'salon.twig');
	}

	public function general ($request, $response)
	{   
		return $this->view->render($response, 'salonGeneral.twig');
	}

	public function cinema ($request, $response)
	{   
		return $this->view->render($response, 'salonCine.twig');
	}

	public function sport ($request, $response)
	{   
		return $this->view->render($response, 'salonSport.twig');
	}

	//Création du salon en base de données
	public function roomCreate($themeSalon, $name)
	{
		$theme = $themeSalon;
		$creator = $name;
		/*$bdd = mysqli_connect('localhost', 'login', 'mdp', 'nom');
		$query = mysqli_prepare($bdd, 'INSERT INTO Salon(libSalon, creator, theme) VALUES(?,?,?)');
		mysqli_stmt_bind_params($query, sss, "Salon de ".$creator, $creator, $theme);*/
		if($theme == 'Cinéma'){
			header("Location: salonCine.twig");
		}
		else if($theme == 'Général'){
			header("Location: salonGeneral.twig");
		}
		else if($theme == 'Sport'){
			header("Location: salonSport.twig");
		}
		/*exit;
		mysqli_free_resutlt($query);*/
	}
}