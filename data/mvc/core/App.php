<?php
namespace Core;

/*
* Hacer login supone decirle al servidor que guarde en sesión la información del usuario actual
*   -> nombre (o email) + contraseña
*   -> La contraseña debe ir cifrada usando un sistema de cifrado
*   -> usaremos password_hash (crea una hash)
* Ejecutamos un script de asignación de constraseñas masivas:
*   -> setpassword.php
* 1) En la ruta /login mostramos una vista: email + contraseña
* 2) Al enviar el formulario debe comprobarse que la contraseña es válida
* 3) Si el usuario está logueado, el botón login debe cambiarse por otro de cerrar sesión (login/logout)
*       -> El método out debe eliminar el usuario de la sesión
* 4) Las rutas del menu deben permanecer ocultas para los usuarios no logueados
* 5) En la sesión debemos guardar el mail del usuario
* php-xml
**/
class App
{

    function __construct()
    {
        session_start();
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
        } else {
            $url = 'home';
        }

        //   controlador/metodo/argumentos
        $arguments = explode('/', trim($url, '/'));
        $controllerName = array_shift($arguments);
        $controllerName = ucwords($controllerName) . "Controller";
        if (count($arguments)) {
            $method =  array_shift($arguments);
        } else {
            $method = "index";
        }

        
        $file = "app/controllers/$controllerName" . ".php";
        if (file_exists($file)) {
            // require_once $file;
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
