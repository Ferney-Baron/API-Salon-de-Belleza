<?php 

namespace Model;

class User extends ActiveRecord {

    protected static $tabla = "usuarios";
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono', 'email', 'password', 'admin', 'confirmado', 'token'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public $email;
    public $password;
    public $admin;
    public $confirmado;
    public $token;

    public function __construct($args = []) {
        
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->admin = $args['admin'] ?? '';
        $this->confirmado = $args['confirmado'] ?? '';
        $this->token = $args['token'] ?? '';
    }

    public function buscarUsuario() {
        $query = "SELECT * FROM ". self::$tabla . " WHERE email = '". $this->email. "' LIMIT 1";
        $res = self::$db->query($query);
        return $res;
    }

    public function crearToken() {
        $this->token = uniqid();
        $this->confirmado = 0;
        $this->admin = 0;
    }

    public function hashPassword($password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $this->password = $hash;
    }
    public function validarPassword($password) {
        $validar = password_verify($this->password, $password);
        return $validar;
    }
}