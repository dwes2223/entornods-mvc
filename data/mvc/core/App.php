<?php
namespace Core;

/*
* - Vamos a acceder a bases de datos
* - Vamos a usar el conector PDO (está incluído en el Dockerfile de mvc)
* - Vamos a usar herencia para que la conexión a la BBDD sea definida en un único sitio
*
* PDO:
*   Interfaz para acceder a bases de datos
*   Proporciona una capa de abstracción de acceso a datos 
*
* Active Record:
*   El patrón active record define clases que permiten el mapeo objeto relacional
*   La misma clase:
*       -> Contiene los atributos correspondientes a las columnas de un registro
*       -> Define los métodos necesarios para la consulta y modificación de registros
*/

class App
{

    function __construct()
    {
        // echo "Clase App<br>";

        if (isset($_GET['url'])) {
            $url = $_GET['url'];
        } else {
            $url = 'home';
        }

        // vamos a usar la url de la siguiente manera:
        //   controlador/metodo/argumentos

        $arguments = explode('/', trim($url, '/'));
        $controllerName = array_shift($arguments);
        $controllerName = ucwords($controllerName) . "Controller";
        if (count($arguments)) {
            $method =  array_shift($arguments);
        } else {
            $method = "index";
        }

        // echo "$url";
        // echo "<pre>";
        // var_dump($arguments);

        // echo $controllerName;
        // echo "<br>";
        // echo $method;
        // echo "<hr>";


        $file = "app/controllers/$controllerName" . ".php";
        if (file_exists($file)) {
            require_once $file;
        } else {
            header("HTTP/1.0 404 Not Found");
            echo "No encontrado";
            die();
        }

        $controllerName = '\\App\\Controllers\\' . $controllerName;
        $controllerObject = new $controllerName;
        if (method_exists($controllerName, $method)) {
            $controllerObject->$method($arguments);
        } else {
            header("HTTP/1.0 404 Not Found");
            echo "No encontrado";
            die();
        }
    }
}
