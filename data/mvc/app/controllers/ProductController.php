<?php
namespace App\Controllers;
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
        require "app/views/product.php";
    }
}
