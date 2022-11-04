<?php
namespace App\Models;

use PDO;
use DateTime;
use Core\Model;

require_once 'core/Model.php';

//Crear nueva columna fecha_compra en la tabla products con el formato aaaa-m-d

class Product extends Model
{
    public function __construct()
    {
        $this->fecha_compra = DateTime::createFromFormat('Y-m-d', $this->fecha_compra);
    }

    /*
    * Método para buscar todos los registros
    */
    public static function all(){ 
        //obtener conexión
        $db = Product::db();
        //preparar consulta
        $sql = "SELECT * FROM products";
        //ejecutar
        $statement = $db->query($sql); // query para ejecutar la consulta
        //el resultado puede ser tomado usan las funciones de de PDO
        //fetch recoge registro a registro. Si hay muchos requiere un bucle
        //fetch_all recoge arrays
        $products = $statement->fetchAll(PDO::FETCH_CLASS, Product::class);
        //retornar
        return $products;
    }

    /*
    * El método find usa funciones preparadas
    * Este método carga un registro a partir de su id
    * Paso de parámetros:
    *   a) pasando un array en el execute
    *   b) método bindParam: se para una variable
    *   c) método bindValue: un literal o el valor de una variable
    */
    public static function find($id) 
    {
        $db = Product::db();
        $stmt = $db->prepare('SELECT * FROM Products WHERE id=:id');
        $stmt->execute(array(':id' => $id));
        //Para cargar un objeto Product debemos usar setFetchMode y fetch
        $stmt->setFetchMode(PDO::FETCH_CLASS, Product::class);
        $product = $stmt->fetch(PDO::FETCH_CLASS);
        //Las fechas se mostrarán con el parseo de mysql
        //  Si es tipo Date: año-mes-dia
        //  Si es DateTime: año:mes-dia h:m:s
        //Php puede manejar de forma nativa datos fecha:
        //  funciones: date() o strtotime()
        #echo "<br>Cambio el formato".$Product->birthdate->format('d-m-y');
        //clase dateTime
        //$this->birthdate = DateTime::createFromFormat('Y-m-d', $Product->birthdate)
        return $product;
    }    
    public function insert(){ 
        //TODO        
    }
    public function delete(){ 
        //TODO        
    }
    public function save(){ 
        //TODO        
    }
}
