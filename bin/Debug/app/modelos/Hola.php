<?php
namespace Modelo;

class Hola extends ActiveRecord {
	protected static $tabla = "hola";
	protected static $columnasDB = ['at1', 'at2'];

	public $at1;
	public $at2;

	public function __construct($args = []) {
		$this->at1 = $args['at1'] ?? '';
		$this->at2 = $args['at2'] ?? '';
	}
}
