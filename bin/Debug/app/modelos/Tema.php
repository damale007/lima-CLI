<?php

namespace Modelo;

class Tema extends ActiveRecord{
    protected static $tabla = "temas";
    protected static $columnasDB = ['id', 'titulo'];

    public $id;
    public $titulo;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
    }

	public function validar() {
		if (!is_string($this->id))
			self::$alertas[] = "id debe ser un texto.";
		if (!is_string($this->titulo))
			self::$alertas[] = "titulo debe ser un texto.";

		return self::$alertas;
	}
}
