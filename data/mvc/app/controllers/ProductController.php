<?php
namespace App\Controllers;


use App\Models\Product;
use Dompdf\Dompdf;

/*
* La inserción requiere dos métodos en el controlador:
*   - Método insert que genera un formulario de alta
*   - Método store que recibe los datos de dicho formulario:
*       -> concluye con un reenvío a la lista, index(), o al detalle, show() del nuevo registro
*
* La actualización requiere dos métodos en el controlador:
*   - Método edit que genera un formulario de modificación con los datos del registro.
*        Este método implica buscar en la base de datos antes de construir el formulario
*   - Método update que recibe los datos de dicho formulario.
*        Igualmente, debemos buscar el registro en la base de datos y después modificarlo
*
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
    
    public function create()
    {
        require 'app/views/product/create.php';
    }
    
    public function store()
    {
        $product = new Product();
        $product->name = $_REQUEST['name'];
        $product->price = $_REQUEST['price'];
        $product->fecha_compra = $_REQUEST['fecha_compra'];        
        $product->insert();
        header('Location: /product');
    }
    
    public function show($args)
    {
        // $id = (int) $args[0];
        list($id) = $args;
        $product = Product::find($id);
        // var_dump($Product);
        // exit();
        require('app/views/product/show.php');        
    }
    public function edit($arguments)
    {
        $id = (int) $arguments[0];
        $product = Product::find($id);
        require 'app/views/product/edit.php';
    }
    
    public function update()
    {
        $id = $_REQUEST['id'];
        $product = Product::find($id);
        $product->name = $_REQUEST['name'];
        $product->price = $_REQUEST['price'];
        $product->fecha_compra = $_REQUEST['fecha_compra'];        
        $product->save();
        header('Location: /product');
    }

    public function delete($arguments)
    {
        $id = (int) $arguments[0];
        $product = Product::find($id);
        $product->delete();
        header('Location: /product');
    }    

    public function pdf()
    {
        //iniciar buffer, para construir un response
        ob_start();
        $users = Product::all();
        require_once ('app/views/product/pdf.php');
        // Volcamos el contenido del buffer
        // el response ya no va al navegador, va a $html
        $html = ob_get_clean();
        
        $dompdf = new Dompdf();
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream("productos.pdf", array("Attachment"=>0));
    }
    public function pdfsimple()
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml('hello world');
        
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');
        
        // Render the HTML as PDF
        $dompdf->render();
        
        // Output the generated PDF to Browser
        $dompdf->stream();        
    }
}
}
