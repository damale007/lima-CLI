<?php 

function conectarDB() : mysqli {
	$db = new mysqli('localhost', 'cambiar por usuario', 'cambiar por contraseña', 'cambiar por base de datos');

    if(!$db) {
        echo "Error no se pudo conectar";
        exit;
    } 

    return $db;
}
