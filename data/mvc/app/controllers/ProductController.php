<?php
namespace App\Controllers;

require_once "app/models/Product.php";
use App\Models\Product;
/**
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
        $products = Product::all();
        //pasar a la vista
        require('app/views/product/index.php');
    }
    
    public function show($args)
    {
        // $id = (int) $args[0];
        list($id) = $args;
        $product = Product::find($id);        
        require('app/views/product/show.php');        
    }
}
