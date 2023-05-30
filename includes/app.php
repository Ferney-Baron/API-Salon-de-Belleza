<?php 

require __DIR__ . './../vendor/autoload.php';
require 'db.php';
require 'funciones.php';

use Model\ActiveRecord;
ActiveRecord::setDB( $db );