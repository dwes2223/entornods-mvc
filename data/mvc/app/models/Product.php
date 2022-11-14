<?php
namespace App\Models;

use PDO;
use DateTime;
use Core\Model;

require_once 'core/Model.php';

class Product extends Model
{
    public function __construct()
    {
        $this->fecha_compra = DateTime::createFromFormat('Y-m-d', $this->fecha_compra);
    }
    public static function all(){ 
        //obtener conexión
        $db = Product::db();
        //preparar consulta
        $sql = "SELECT * FROM products";
        //ejecutar
        $statement = $db->query($sql);
        //recoger datos con fetch_all
        $products = $statement->fetchAll(PDO::FETCH_CLASS, Product::class);
        //retornar
        return $products;
    }
    public static function find($id) 
    {
        $db = Product::db();
        $stmt = $db->prepare('SELECT * FROM products WHERE id=:id');
        $stmt->execute(array(':id' => $id));
        $stmt->setFetchMode(PDO::FETCH_CLASS, Product::class);
        $user = $stmt->fetch(PDO::FETCH_CLASS);
        // echo $this->fecha_compra->format('d-m-y');
        return $user;
    } 
    public static function findbyPrice($price){

        $db = Product::db();
        $stmt = $db->prepare('SELECT * FROM products WHERE price=:price');
        $stmt->execute(array(':price' => $price));
        $stmt->setFetchMode(PDO::FETCH_CLASS, Product::class);
        $user = $stmt->fetch(PDO::FETCH_CLASS);
        return $user;
    }
    public function setPassword($password)
    {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $db = Product::db();
        $stmt = $db->prepare('UPDATE products SET password = :password WHERE id = :id');
        $stmt->bindValue(':id', $this->id);
        $stmt->bindValue(':password', $password);
        $stmt->execute();
        return $password;
    }
    public function passwordVerify($password, $user)
    {
        return password_verify($password, $user->password);
    } 
    public function insert()
    {
        $db = Product::db();
        $stmt = $db->prepare('INSERT INTO products(name, price, fecha_compra) VALUES(:name, :price, :fecha_compra)');
        $stmt->bindValue(':name', $this->name);
        $stmt->bindValue(':price', $this->price);        
        $stmt->bindValue(':fecha_compra', $this->fecha_compra);
        return $stmt->execute();
    }

    public function save()
    {
        $db = Product::db();
        $stmt = $db->prepare('UPDATE products SET name = :name, price = :price, fecha_compra = :fecha_compra WHERE id = :id');
        $stmt->bindValue(':id', $this->id);
        $stmt->bindValue(':name', $this->name);
        $stmt->bindValue(':price', $this->price);
        $stmt->bindValue(':fecha_compra', $this->fecha_compra);        
        return $stmt->execute();
    }
    
    public function delete(){ 
        $db = Product::db();
        $stmt = $db->prepare('DELETE FROM products WHERE id = :id');
        $stmt->bindValue(':id', $this->id);
        return $stmt->execute();
    }
}
