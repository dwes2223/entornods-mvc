<?php

    require_once "Product.php";    

    class Controller{
        
        //constructor de la clase -> vacio
        public function __construct(){}   
        
        /*funcion que:
           - Recupera TODOS los productos del modelo (metodo all)
           - llama a la vista index.php para mostrar TODOS los productos.
        */
        public function home(){
            $products = Product::all();
            require "views/home.php";
        }

        /*funcion que:
           - Recupera un producto en particular del modelo (metodo find).
           - llama a la vista show.php para mostrar algun producto en particular.
        */
        public function show(){
            $id = $_GET["id"];  // el identificador proviene del fichero lanzador start.php.            
            $product = Product::find($id);            
            require "views/show.php";
        } 

    }//fin_clase