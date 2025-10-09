<?php
use Controlador\UsuarioController;
	use Controlador\HomeController;

	$router->route('/', [HomeController::Class, 'index']);
	$router->route('/hola', [HomeController::Class, 'home']);
	$router->route('/hoa2', [UsuarioController::Class, 'index']);
	$router->route('/aa', [HomeController::Class, 'home']);
