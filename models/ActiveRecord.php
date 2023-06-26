<?php

namespace Model;

class ActiveRecord {

    protected static $db;
    protected static $tabla = '';
    protected static $columnasDB = [];

    protected static $alertas = [];


    public static function setDB( $db ) {
        self::$db = $db;
    }

    public static function setAlertas($tipo, $mensaje) {
        static::$alertas[$tipo] = $mensaje;
    }
    public static function getAlertas() {
        return static::$alertas;
    }


    public function find($id) {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = " . $id;
        $res = self::$db->query($query);        
        return $res;
    }

    public static function findAll() {
        $query = "SELECT * FROM " . static::$tabla;
        $res = self::$db->query($query);
        return $res;
    }


    // Transfroma los las columnas de la db y los datos del post en un arreglo asociativo
    public static function transformar($arg = []) {

        $llave = [];
        for ($i = 0 ; $i < count(static::$columnasDB); $i++) {
            if(static::$columnasDB[$i] !== 'id') {
                $llave[static::$columnasDB[$i]] = '';
            }
        }

        foreach($arg as $key => $value) {
            if($key !== 'id') {
                $llave[$key] = $value;
            }
            
        }

        return $llave;
    }

    public function crear($value) {

        // debug();

        $datos = self::transformar($value);
        $columnas = implode(', ', array_keys($datos));
        $transformarValores = array_map( function ($valor) {
            return "'" . $valor . "'";
        }, array_values($datos));

        $valoresColumnas = implode(', ', array_values($transformarValores));
       
        $query = "INSERT INTO " . static::$tabla . "(" . $columnas; 
        $query .= ") VALUES ( " . $valoresColumnas . ")"; 

        // debug($query);

        $res = self::$db->query($query);

        return $res;
    }

}


