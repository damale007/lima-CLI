<?php

namespace MVC;
define('NO_INIC', 0);
define('PERMISO', 1);
define('NO_PERMISO', 2);

class Router {
    public $rutasGET = [];
    public $rutasPOST = [];
    public $rutasMiddl = [];
    public $parametros = [];
    private $metodo;
    private $controlador;
	public $link404 = ERROR404;

    public function get($url, $fn){
        $this->rutasGET[] = ["url" => $url, "funcion" => $fn];
    }

    public function post($url, $fn){
        $this->rutasPOST[] = ["url" => $url, "funcion" => $fn];
    }

    public function middleware($controlador, $metodo, $middleware){
        $this->rutasMiddl[] = ["controlador" => $controlador, "metodo" => $metodo, "nombre" => $middleware];
    }

    public function getMethod(){
        return $this->metodo;
    }

    public function getController(){
        return $this->controlador;
    }

    public function ruta($metodo, $urlActual) {
       $rutas = [];

        if ($metodo === 'GET')
            $rutas = $this->rutasGET;
        else
            $rutas = $this->rutasPOST;

        $ret = ["", "", "", ""];

        $divide = explode("/", $urlActual);
        $numDivide = count($divide) -1;

        foreach($rutas as $linea) {
            $barras = substr_count($linea['url'], "/");

            $compara = "";
            for ($i=0; $i<=$barras -1; $i++) {
                if ($numDivide >= $i+1)
                    if ($divide[$i+1] != "") $compara .= "/".$divide[$i+1];
            }

            if ($compara == "") $compara = "/";

            if ($compara == $linea['url']) {
                $params = substr($urlActual, strlen($linea['url']));
                if (strlen($params)< $ret[2] || $ret[2] == ""){
                    $middleware = "";
                    if (count($linea['funcion'])>2)
                        $middleware = $linea['funcion'][2];
                    $ret=[$linea['funcion'][0], $linea['funcion'][1], explode("/", $params), $middleware];
                }
            }
        }

        if ($ret[0] == "" && $ret[1] == "" && $ret[2] == "")
            return null;
        else
            return $ret;
    }

    public function getParam($index) {
        $totalParametros = count($this->parametros);
        $inicio = 1;

        if ($totalParametros > 0) {
            if ($this->parametros[0] != "") {
                $index--;
                $inicio = 0;
            } else $totalParametros--;

            if ($index < $inicio || $index > $totalParametros)
                return "null";

            return htmlspecialchars($this->parametros[$index], ENT_QUOTES, 'UTF-8');

        } else return "null";
    }

    public function countParams(){
        if (count($this->parametros) == 1)
            if ($this->parametros[0] == "")
                return 0;
            else 
                return 1;
        else
            return count($this->parametros);
    }

    public function comprobarRutas() {
        $urlActual = $this->limpia($_SERVER['REQUEST_URI']) ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        $pos = strpos($urlActual, "?");
        if ($pos) $urlActual = substr($urlActual, 0, $pos);

        $fn = $this->ruta($method, $urlActual);
        if ($fn == null) 
            $this->redirecciona("error404");
        
        $this->parametros = $fn[2];
   
        $last = strpos($fn[0], "\\") + 1;
        $nombre = substr($fn[0], $last);
        $archivo = '../app/controladores/'.$nombre.'.php';
        if (file_exists($archivo)) {
            include_once "../app/controladores/".$nombre.".php";

            if ($fn) {
                $this->metodo = $fn[1];
                $this->controlador = substr($fn[0], 12);
                session_start();

                $permiso = NO_INIC;
                foreach($this->rutasMiddl as $md){
                    if (($md['controlador'] == substr($fn[0], 12) || $md['controlador'] == "*") && ($md['metodo'] == $fn[1] || $md['metodo'] == "*")) 
                        if (call_user_func(["MVC\Middleware", $md['nombre']], $this))
                            $permiso = PERMISO;
                        else 
                            $permiso = NO_PERMISO;
                }

                if ($permiso == PERMISO || $permiso == NO_INIC) {
                    if ($fn[3] != "") {
                        if (call_user_func(["MVC\Middleware", $fn[3]], $this)) 
                            call_user_func([$fn[0], $fn[1]], $this);
                        else {
                            $this->redirecciona("errorMiddl");
                        }
                    } else 
                        call_user_func([$fn[0], $fn[1]], $this);
                }
            } else {
                $this->redirecciona("error404");
            }
        } else 
            echo "ERROR: Controlador no existe.";
    }

    private function redirecciona($redir) {
        if ($this->link404) 
            goHome();
        else
            $this->render($redir, []);
    }

    // Variable $titulo para definir un título de la web
    // Variable $descripción para definir una descripción en las SERP para SEO
    public function render($view, $args = []) {
        
        foreach ($args as $key => $value){
            $$key = $value;
        }
		$titulo = TITLE;
		$descripcion = DESCRIPTION;
        ob_start();
        include "app/vistas/".$view.".php";

        $contenido = ob_get_clean();

        include "app/vistas/layout.php";
    }

    private function limpia($ruta) {
        $base = substr($_SERVER['PHP_SELF'], 0, strlen($_SERVER['PHP_SELF'])-10);

        if (strlen($ruta) < strlen($base))
            return $ruta;
        
        if (substr($ruta, 0, strlen($base)) == $base)
            $ruta = substr($ruta, strlen($base), strlen($ruta) - strlen($base));

        return $ruta;
    }
}
