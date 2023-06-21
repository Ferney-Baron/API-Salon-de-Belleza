<?php

namespace Controller;
use Model\Especialist;

class EspecialistController {

    public static function especialist() {
        echo json_encode(Especialist::seleccionar());
    }

}