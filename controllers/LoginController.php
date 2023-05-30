<?php 

namespace Controller;

use Model\User;

class LoginController {
    public static function login() {
        header("Access-Control-Allow-Origin: *");

        $usuario = new User($_POST);
        $res = [];

        $usuarioRegistrado = $usuario->buscarUsuario();

        if ( $usuarioRegistrado->num_rows ) {
            $objeto = json_decode(json_encode($usuarioRegistrado->fetch_assoc()));
            $password = $objeto->password;
            
            $validar = $usuario->validarPassword($password);

            // if ( $validar )
            $res[]['usuario'] = true;
            $res[]['password'] = true;
            // Arreglar mas tarde

        } else {
            $res[]['usuario'] = false;
            $res[]['password'] = false;
        }

        echo json_encode($res);
        // echo json_encode($_POST);
    }

    public static function signup() {
        $usuario = new User($_POST);
        
        if (!$usuario->buscarUsuario()->num_rows) {
            $usuario->crear($_POST);
            echo 'User registration';
        } else {
            echo 'Usuario ya Registrado';
        }
    }

    public static function index() {
        
    }
}