<?php 

namespace Model;

class User extends ActiveRecord {

    protected static $tabla = "usuarios";
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono', 'email', 'password'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public $email;
    public $password;

    public function __construct($args = []) {
        
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function buscarUsuario() {
        $query = "SELECT * FROM ". self::$tabla . " WHERE email = '". $this->email. "' LIMIT 1";
        $res = self::$db->query($query);
        return $res;
    }

    public function crearUsuario() {
        // $query = "INSERT INTO ". $this->tabla . 
    }

    public function validarPassword($password) {
        $validar = password_verify($password, $this->password);
        return $validar;
    }
}