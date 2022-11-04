<?php
namespace Core;

require_once 'config/db.php';
use const Config\DSN;
use const Config\USER;
use const Config\PASSWORD;

//necesario para referirnos a ella
use PDO;
use PDOException;

/*
* Vamos a definir la conexión a la BD dentro de una superclase modelo
*       y el resto de las clases que acceden a BD heredan de ella
*/
class Model
{

    function __construct()
    {
        # code...
    }

    protected static function db()
    {
        try {
            $db = new PDO(DSN, USER, PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }
        return $db;
    }
}
