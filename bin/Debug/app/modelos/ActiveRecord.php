<?php
namespace Modelo;

class ActiveRecord {
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';

    protected static $alertas = [];
    protected static $limite = 0;
    protected static $paginacion = 0;
    protected static $paginaActual = 1;
    protected static $totalRegistros = 0;
    protected static $caduca = false;

    public static function setDB($database) {
        self::$db = $database;
    }

    public static function pagina($pag = 0) {
        static::$paginacion = $pag;
    }

    public static function limite($valor, $caduca = true) {
        static::$limite = $valor;
        static::$caduca = $caduca;
    }

    public static function all($orden = '') {
        $query = "SELECT * FROM ".static::$tabla;        
        $query .= static::completa($orden, $query);
        
        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    public static function find($id) {
        $id = validar($id, "/");

        $query = "SELECT * FROM ".static::$tabla . " WHERE id=" .$id . " LIMIT 1";
        $resultado = self::consultarSQL($query);

        return array_shift($resultado);
    }

    private static function completa($orden, $q) {
        $query = " ";
        $pagina = 1;

        if ($orden !="") $query.="ORDER BY ".$orden;
        if (static::$paginacion >0){
            $resultado = self::consultarSQL($q);
            static::$totalRegistros = count($resultado);

            if (isset($_GET['pagina']))
                $pagina = $_GET['pagina'];

            $inicio = ($pagina - 1) * static::$paginacion;

            if (static::$totalRegistros > static::$paginacion)
                $query .= " LIMIT ".$inicio.", ".static::$paginacion;

        } else {
            if (static::$limite > 0) $query.=" LIMIT ".static::$limite;
            if (static::$caduca) static::$limite = 0;
        }

        return $query;
    }

    private static function urlPag($pag) {
        $urlActual = $_SERVER['REQUEST_URI'] ?? '/';

        if (str_contains($urlActual, "?"))
            $urlActual .= "&pagina=".$pag;
        else
            $urlActual .= "?pagina=".$pag;

        return $urlActual;
    }

    public static function paginacion($limite, $botones, $inicio, $delimitador) {
        $ret = "";
        $numPaginas = intval(static::$totalRegistros / static::$paginacion);

        $fin = $inicio;
        switch ($inicio) {
            case "[": $fin = "]";
            break;
            case "(": $fin = ")";
            break;
            case "{": $fin = "}";
            break;
        }

        $pagina = 1;
        if (isset($_GET['pagina']))
            $pagina = $_GET['pagina'];

        $primeraPag = 1;
        $ultimaPag = $numPaginas;

        if ($limite != 0) {
            $ultimaPag = $primeraPag + $limite -1;

            if ($pagina + intval($limite / 2) < $numPaginas && $pagina >= intval($limite / 2)){
                $primeraPag = $pagina - intval($limite / 2);
                $ultimaPag = $primeraPag + $limite -1;
            } else {
                if ($pagina + intval($limite / 2) > $numPaginas) {
                    $ultimaPag = $numPaginas;
                    $primeraPag = $ultimaPag - $limite + 1;
                }
            }
        }

        // Botón anterior
        if ($botones) {
            if ($pagina > 1) {
                $enlace = $pagina-1;
                $ret = "<a href='".static::urlPag($enlace)."'><button class='botonIndiceAnterior'>Pag. anterior</button></a>"; 
            }
        }

        $ret .= "<span class='indice'>";
        for ($i=$primeraPag; $i<= $ultimaPag; $i++){
            if ($i != $pagina) {
                $ret .= "<span class='paginaIndice'><a href='".static::urlPag($i)."'>".$inicio.$i.$fin."</a></span>";
                if ($i < $ultimaPag) $ret .= " ".$delimitador." ";
            } else {
                $ret .= "<span class='paginaActual'>".$inicio.$i.$fin."</span>";
                if ($i < $ultimaPag) $ret .= " ".$delimitador." ";
            }
        }
        $ret .= "</span>";

        // Botón siguiente
        if ($botones) {
            if ($pagina < $numPaginas) {
                $enlace = $pagina+1;
                $ret .= "<a href='".static::urlPag($enlace)."'><button class='botonIndiceSiguiente'>Pag. siguiente</button></a>"; 
            }
        }

        return $ret;
    }

    public static function where($condicion, $orden = "") {
        $query = "SELECT * FROM ".static::$tabla . " WHERE ".$condicion;
        $query .= static::completa($orden, $query);
        

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    public static function consultarSQL($query) {
        $qr = self::$db->query($query);

        $array = [];
        while($resultado = $qr->fetch_assoc()) {
            $array[] = $objeto = self::creaObjeto($resultado);
        }

        $qr->free();

        return $array;
    }

    public static function ejecutarSQL($query) {
        $return = self::$db->query($query);

        return $return;
    }

    public static function creaObjeto($resultado) {
        $objeto = new static;

        foreach ($resultado as $key => $valor) {
            $objeto->$key = $valor;
        }
        return $objeto;
    }

    public function guardar() {
        $resultado = '';
        if(is_null($this->id) || $this->id == '') {
            $resultado = $this->crear();
        } else {
            // Creando un nuevo registro
            $resultado = $this->actualizar();
        }
        return $resultado;
    }

    public function crear() {
        // Sanear los datos
        $atributos = $this->sanearAtributos();

        // Insertar en la base de datos
        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES ('"; 
        $query .= join("', '", array_values($atributos));
        $query .= "') ";

        $query = str_replace("'null'", "null", $query);
        $query = str_replace("[EMPTY]", "", $query);

        // Resultado de la consulta
        $resultado = self::$db->query($query);
        return [
           'resultado' =>  $resultado,
           'id' => self::$db->insert_id
        ];
    }

        // Sincroniza BD con Objetos en memoria
        public function sincronizar($args=[]) { 
            foreach($args as $key => $value) {
              if(property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
              }
            }
        }

    // Actualizar el registro
    public function actualizar() {
        // Sanitizar los datos

        $atributos = $this->sanearAtributos();

        // Iterar para ir agregando cada campo de la BD
        $valores = [];
        foreach($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        // Consulta SQL
        $query = "UPDATE " . static::$tabla ." SET ";
        $query .=  join(', ', $valores );
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 "; 

        // Actualizar BD
        $resultado = self::$db->query($query);
        return $resultado;
    }

    // Eliminar un Registro por su ID
    public function eliminar() {
        $query = "DELETE FROM "  . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);
        return $resultado;
    }

    public function sanearAtributos() {
        $atributos = $this->atributos();
        $saneado = [];
        foreach($atributos as $key => $value ) {
            if ($value != null) {
                if ($value == -1)
                    $saneado[$key] = 'null';
                else {
                    $saneado[$key] = self::$db->escape_string($value);
                    $saneado[$key] = trim($saneado[$key]);
                }
            } else
                if ($value != 0)
                    $saneado[$key] = 'null';
                else
                    $saneado[$key] = $value;
        }
        return $saneado;
    }

    public function atributos() {
        $atributos = [];
        foreach(static::$columnasDB as $columna) {
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }
}