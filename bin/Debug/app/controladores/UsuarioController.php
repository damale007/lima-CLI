<?php
namespace Controlador;
use MVC\Router;

Class UsuarioController{
	public static function index(Router $router) {
		//Código
		$router->render('nombre_de_la_vista', [
			'variable a vista' => $variable
		]);
	}
}
