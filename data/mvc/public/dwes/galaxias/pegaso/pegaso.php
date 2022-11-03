<?php
    namespace Dwes\Galaxias\Pegaso;
  
    const RADIO = 60.5; //millones de km.

    function observar($mensaje){
      echo "<br>Observando la galaxia con nombre " . $mensaje;
    }

    class Galaxia{
        function nacimiento(){
            echo "<br>Soy un nueva Galaxiaaaaa!";
        }
        
        function __construct()
        {
            $this->nacimiento();
        }

        static function muerte($nombre){
            echo "<br>Galaxia " . $nombre . " muriendose....";
        }
    }