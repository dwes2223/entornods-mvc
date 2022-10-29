<?php
  require_once "Controller.php";

   $app = new Controller(); //creo recurso controller

  if(isset($_GET["method"])){
    $method = $_GET["method"]; // puede ser index o show 
  }else{
    $method = "home"; //por defecto si no se especifica ninguno es index.
  }

  //verifica si existe el metodo solicitado en la clase (Controller)
  if(method_exists($app,$method)){
    $app->$method();  //ejecuta el metodo correspodiente de la clase Controller
  }else{
    //devuelve mensaje de error
    http_response_code(404);
    die("Producto no encontrado");
  }



