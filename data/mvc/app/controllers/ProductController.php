<?php
namespace App\Controllers;

require_once "app/models/Product.php";
use App\Models\User;
/**
*
*/
class ProductController
{

    function __construct()
    {
        // echo "En UserController";
    }

    public function index()
    {
        //buscar datos
        $users = User::all();
        //pasar a la vista
        require('app/views/product/index.php');
    }
    
    public function show($args)
    {
        // $id = (int) $args[0];
        list($id) = $args;
        $user = User::find($id);        
        require('app/views/product/show.php');        
    }
}
