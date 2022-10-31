<?php
  class Product
  {
      const PRODUCTS = [
        array(1,"Cortacesped"),
        array(2,"Taladro"),
        array(3,"Sierra"),
        array(4,"Manguera"),
        array(5,"Pintura")
      ];

      

      //constructor de la clase -> vacio
      public function __construct(){}

      //Devuelve todos los productos
      public static function all(){
          return Product::PRODUCTS;
      }

      //Devuelve el producto con el identificador pasado como parametro O NULL.
      public static function find($id){
        /*/foreach(Product::PRODUCTS as $key=>$item){
           if($item[0] == $id)
              return $item;
              
        }
        return null;*/
        return Product::PRODUCTS[$id-1]; //devuelve un array con el producto. El id empieza en 1.
      }

  }//fin_clase