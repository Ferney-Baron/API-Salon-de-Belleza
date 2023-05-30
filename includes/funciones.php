<?php


function error(): void {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

function debug( $variable ): string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}