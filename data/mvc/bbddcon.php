<?php
// mysql:dbname=<nombre_bbdd>;host=<ip_host | nombre_host>;   dsn = data source name

$dsn = "mysql:dbname=demo;host=db";
$usuario = "dbuser";
$clave = "secret";
try {
    $bd = new PDO($dsn, $usuario, $clave);  //establece la conexion
    echo "<br>Conexion satisfactoria";
} catch (PDOException $ex) {
    echo "<br>Error en la conexion :" . $ex->getMessage();
    die();
}