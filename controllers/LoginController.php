<?php 

namespace Controller;

use Model\User;
use Classes\Email;

class LoginController {
    public static function login() {
        header("Access-Control-Allow-Origin: *");

        $usuario = new User($_POST);
        $res = [];

        $usuarioRegistrado = $usuario->buscarUsuario();

        if ( $usuarioRegistrado->num_rows ) {
            $objeto = json_decode(json_encode($usuarioRegistrado->fetch_assoc()));
            
            $validar = $usuario->validarPassword($objeto->password);

            // debug($validar);
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
            $usuario->crearToken();
            $usuario->hashPassword($usuario->password);            
            $email = new Email;    
            $email->enviarConfirmacion();
            // $usuario->crear($usuario);
            echo 'User registration';
        } else {
            echo 'Usuario ya Registrado';
        }
    }

    public static function index() {
        
    }
}