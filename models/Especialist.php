<?php

namespace Model;

class Especialist extends ActiveRecord {


    public static $tabla = 'especialistas';
    public static $columnasDB = ['id', 'nombre', 'apellido'];

    public $id;
    public $nombre;
    public $apellido;

    public function __construct($arg=[]) {
        $this->id = $arg['id'] ?? '';
        $this->nombre = $arg['nombre'] ?? '';
        $this->apellido = $arg['apellido'] ?? '';
    }
}
