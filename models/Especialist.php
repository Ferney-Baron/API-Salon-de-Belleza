<?php

namespace Model;

class Especialist extends ActiveRecord {


    public static function seleccionar() {
        $estilistas = [];

        $query = 'SELECT * FROM especialistas';
        $res = self::$db->query($query);
      
        while( $row = $res->fetch_assoc()) {
            $estilistas['especialista' . $row['id']] = $row['nombre'] . ' ' . $row['apellido'];
        }

        return $estilistas;
    }
}
