<?php
namespace App\Controllers;

use App\Models\Product;
use Dompdf\Dompdf;

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
        $product->surname = $_REQUEST['surname'];
        $product->birthdate = $_REQUEST['birthdate'];
        $product->email = $_REQUEST['email'];
        $product->insert();
        header('Location:'.PATH.'/product');
    }
    
    public function show($args)
    {
        // $id = (int) $args[0];
        list($id) = $args;
        $product = Product::find($id);
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
        $product->surname = $_REQUEST['surname'];
        $product->birthdate = $_REQUEST['birthdate'];
        $product->email = $_REQUEST['email'];
        $product->save();
        header('Location:'.PATH.'/product');
    }
    
    public function delete($arguments)
    {
        $id = (int) $arguments[0];
        $product = Product::find($id);
        $product->delete();
        header('Location:'.PATH.'/product');
    }
    
    public function pdf()
    {
        //iniciar buffer, para construir un response
        ob_start();
        $products = Product::all();
        require_once ('app/views/product/pdf.php');
        // Volcamos el contenido del buffer
        // el response ya no va al navegador, va a $html
        $html = ob_get_clean();
        
        $dompdf = new DOMPDF();
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream("usuarios.pdf", array("Attachment"=>0));
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
