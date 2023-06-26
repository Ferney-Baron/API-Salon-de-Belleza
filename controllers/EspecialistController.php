<?php

namespace Controller;

use Model\Especialist;

class EspecialistController {

    public static function especialist() {
        $res = Especialist::findAll();
        $especialistas = [];

        while($row = $res->fetch_assoc()) {
            $especialistas[] = $row;
        }

        echo json_encode($especialistas);
    }

}