<?php
namespace Modelo;

class Migrations extends ActiveRecord{
    public function create(){
		$hola = [
			'at1' => ['string:10', 'unique'],
			'at2' => ['integer']
		];
		$this::createTable('hola', $hola);

        $hola2 = [
			'at1' => ['string', 'unique'],
			'at2' => ['date']
		];
		$this::createTable('hola2', $hola2);

    }

    public static function createTable($tabla, $atributos) {
        $sql = createNewTable($tabla, $atributos);
        self::ejecutarSQL('DROP TABLE IF EXISTS '.$tabla.';');
        foreach($sql as $l) {
            self::ejecutarSQL($l);
        }
    }
}
