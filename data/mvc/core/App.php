<?php
  class App{

    function __construct()
    {
        if(isset($_GET["url"])){
            //var_dump($_GET["url"]);
            $url = $_GET["url"];
            
        }else{
            //var_dump($_GET["url"]);
            $url = "home";
            
        }//if-else

        //parsea la url  Ej: /product/mostar/arg1/arg2
        //  elem 1 = /usuario, elem2= /mostrar  , elem3 = arg1 ...
        $arguments = explode('/',trim($url,'/')); 
        $controllerName = array_shift($arguments);
        $controllerName = ucwords($controllerName) . "Controller";  //ProductController
        
        //verifica si la url contiene metodos. Si no contienes ninguno por defecto index.
        if(count($arguments)){
            $method = array_shift($arguments); //obtiene el metodo -> mostrar            
        }else{
            $method = "index";
        }

        //Incluye el controlador solicitado por url. Si no existe devuelvo error
        $file = "../app/controllers/$controllerName.php" ;
        if(file_exists($file)){
            require_once "$file";
        }else{
            header("HTTP/1.0 404 Not Found");
            echo "<br>Fichero de CONTROLADOR no encontrado";
            die();
        }

        //Ejecuto el metodo del controlador solicitado por url
        $controllerObject = new $controllerName;
        if(method_exists($controllerName,$method)){
            //si existe el metodo de la clase , lo ejecuto
            $controllerObject->$method($arguments);
        }else{
            header("HTTP/1.0 404 Not Found");
            echo "<br>Metodo no encontrado en la clase";
            die();
        }
    }//fin_construct   

  }//fin_clase