<?php 
require "includes.php";
require "systemFunc.php";
require "funciones.php";
require "config/database.php";
require "autoload.php";

// Conectarnos a la base de datos
$db = conectarDB();

use Modelo\ActiveRecord;

ActiveRecord::setDB($db);