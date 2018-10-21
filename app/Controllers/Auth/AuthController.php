<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;
use Respect\Validation\Validator as v;

class AuthController extends Controller {

	public function getSignOut()
	{
		//Déconnexion
		$this->auth->logout();
		//redirect
		return $response->withRedirect($this->router->pathFor('home'));
	}

	public function getSignIn($request, $response)
	{
		return $this->view->render($response, 'auth/signin.twig');
	}


	public function postSignIn($request, $response)
	{
		$auth = $this->auth->attemps(
			$request->getParam('email'),
			$request->getParam('password')
		);
		
		if (!$auth) {
			return $response->withRedirect($this->router->pathFor('auth.signin'));
		}

		return $response->withRedirect($this->router->pathFor('home'));
	}


	public function getSignUp($request, $response)
	{
		//var_dump($this->csrf->getTokenNameKey());
		//var_dump($this->csrf->getTokenValueKey());
		//var_dump($request->getAttribute('csrf_value'));

		return $this->view->render($response, 'auth/signup.twig');
	}

	public function postSignUp($request, $response)
	{
		$validation = $this->validator->validate($request, [
			'email' => v::noWhitespace()->notEmpty()->email()->emailAvailable(),
			'name' => v::notEmpty()->alpha(),
			'password' => v::noWhitespace()->notEmpty(),
		]);


		if ($validation->failed()) {
			return $response->withRedirect($this->router->pathFor('auth.signup'));
		}


		$user = User::create([
			'email' => $request->getParam('email'),
			'name' => $request->getParam('name'),
			'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT),
		]);

		//authentification auto
		$this->auth->attempt($user->email, $request->getParam('password'));

		return $response->withRedirect($this->router->pathFor('home'));
	}
}
