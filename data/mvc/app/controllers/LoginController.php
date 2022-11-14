<?php
namespace App\Controllers;

use App\Models\Product;

class LoginController
{

    function __construct()
    {
        // echo "En LoginController";
    }

    public function index()
    {
        require "app/views/login.php";
    }

    public function login(){

        $email = $_POST['email'];
        $password = $_POST['password'];
        $product = Product::findbyEmail($email);
        
        if($product == false){
            $_SESSION['message'] = 'Error el usuario no existe.';
            header('Location:'.PATH.'/login');
        }
        else
        {
            // Comprueba que la contraseña coincida con la contraseña cifrada
            if(Product::passwordVerify($password, $product))
            {
                $_SESSION['product'] = $product;
                header('Location:'.PATH.'/home');
            }
            else{
                $_SESSION['message'] = 'Error, la contraseña es incorrecta.';
                header('Location:'.PATH.'/login');
            }
        }
    }

    public function logout()
    {
        unset($_SESSION['product']);
        unset($_SESSION['message']);
        session_destroy();
        require "app/views/login.php";
    }
}
