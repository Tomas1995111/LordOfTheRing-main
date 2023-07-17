<?php

$dbname="lordofthering";
$servidor="localhost";
$user="root";
$password="";


try {
    $conexion = new PDO("mysql:host=localhost;dbname=$dbname", $user, $password);
} catch (PDOException $e) {

    echo $e->getMessage();
}