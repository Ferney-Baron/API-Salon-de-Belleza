<?php

$db = mysqli_connect(
    'localhost',
    'root',
    '12345',
    'salon_de_belleza'
);

if(!$db) {
    echo 'error';
    exit;
}