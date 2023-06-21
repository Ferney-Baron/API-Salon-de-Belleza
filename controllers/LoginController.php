<?php 

namespace Controller;

use Model\User;
use Classes\Email;

class LoginController {
    public static function login() {
        

        $usuario = new User($_POST);
        $res = [];

        $usuarioRegistrado = $usuario->buscarUsuario();

        if ( $usuarioRegistrado->num_rows ) {
            $objeto = json_decode(json_encode($usuarioRegistrado->fetch_assoc()));
            
            $validarPassword = $usuario->validarPassword($objeto->password);

            ($validarPassword) ? $res['password'] = true : $res['password'] = false;

            $res['usuario'] = true;

        } else {
            $res['usuario'] = false;
            $res['password'] = false;
        }

        echo json_encode($res);
    }

    public static function signup() {
        $usuario = new User($_POST);
        
        if (!$usuario->buscarUsuario()->num_rows) {
            $res['usuario'] = true;
            $alertas = $usuario->validarEmail();
            
            if(empty($alertas)) {
                $email = new Email; 
                if($email->enviarConfirmacion()) {
                    $usuario->crearToken();
                    // $usuario->hashPassword($usuario->password); 
                    $usuario->crear($usuario);

                    $res['alertas'] = 'Verifica La Cuenta en tu Email';
                } else {
                    $res['alertas'] = 'Error en el Servidor, Intenta de Nuevo!';
                }
            } else {
                $res['alertas'] = $alertas;
            }
        } else {
            $res['usuario'] = false;
            $res['motivo'] = 'Usuario ya Registrado';
        }

        echo json_encode($res);
    }
}