<?php

namespace App\Controllers;

use Slim\Views\Twig as View;

class ThemeController extends Controller {

	public function index ($request, $response)
	{

		return $this->view->render($response, 'theme1.twig');
	}
}