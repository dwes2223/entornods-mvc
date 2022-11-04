<?php

   namespace Core;
   require_once "../config/db.php";

    use const Config\DSN;
    use const Config\USER;
    use const Config\PASSWORD;

   use PDO  ; //Si no lo pongon busca por defecto Core\PDO
   use PDOException;
    
 class Model{
  protected static function db(){
     try {
        $db = new PDO(DSN,USER,PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

     } catch (PDOException $e) {
        echo "Fallo la conexion : " . $e->getMessage();
     }

     return $db;
  }//fin_funcion

 }