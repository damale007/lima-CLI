<?php 
require "includes.php";

set_exception_handler(['MVC\Error', 'exceptionHandler']);

use Modelo\ActiveRecord;

// Conectarnos a la base de datos
//$db = conectarDB();
$db = new DataBase();

ActiveRecord::setDB($db);