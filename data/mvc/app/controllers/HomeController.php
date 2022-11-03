<?php
  namespace App\Controllers;

  class HomeController{
    
    public function __construct()
    {
          //echo "<br>En HOME Controller";
    }

    public function index(){
        //echo "<br> En INDEX de HOMECONTROLLER";
        require "../app/views/home.php";
    }

    public function show(){
        echo "<br> En SHOW de HOMECONTROLLER";
    }

  }//finclase