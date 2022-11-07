<?php
namespace App\Controllers;

require_once "app/models/Product.php";
use App\Models\Product;

/*
* La inserción requiere dos métodos en el controlador:
*   - Método insert que genera un formulario de alta
*   - Método store que recibe los datos de dicho formulario:
*       -> concluye con un reenvío a la lista, index(), o al detalle, show() del nuevo registro
*
* La actualización requiere dos métodos en el controlador:
*   - Método edit que genera un formulario de modificación con los datos del registro.
*        Este método implica buscar en la base de datos antes de construir el formulario
*   - Método update que recibe los datos de dicho formulario.
*        Igualmente, debemos buscar el registro en la base de datos y después modificarlo
*
*
*/
class ProductController
{

    function __construct()
    {
        // echo "En ProductController";
    }

    public function index()
    {
        //buscar datos
        $Products = Product::all();
        //pasar a la vista
        require('app/views/product/index.php');
    }
    
    public function create()
    {
        require 'app/views/product/create.php';
    }
    
    public function store()
    {
        $product = new Product();
        $product->name = $_REQUEST['name'];
        $product->price = $_REQUEST['price'];
        $product->fecha_compra = $_REQUEST['fecha_compra'];        
        $product->insert();
        header('Location: /product');
    }
    
    public function show($args)
    {
        // $id = (int) $args[0];
        list($id) = $args;
        $product = Product::find($id);
        // var_dump($Product);
        // exit();
        require('app/views/product/show.php');        
    }
    public function edit($arguments)
    {
        $id = (int) $arguments[0];
        $product = Product::find($id);
        require 'app/views/product/edit.php';
    }
    
    public function update()
    {
        $id = $_REQUEST['id'];
        $product = Product::find($id);
        $product->name = $_REQUEST['name'];
        $product->price = $_REQUEST['price'];
        $product->fecha_compra = $_REQUEST['fecha_compra'];        
        $product->save();
        header('Location: /product');
    }

    public function delete($arguments)
    {
        $id = (int) $arguments[0];
        $product = Product::find($id);
        $product->delete();
        header('Location: /product');
    }    
}
