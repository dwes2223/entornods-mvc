<?php
    namespace Dwes\Galaxias;
  
    const RADIO = 125.4; //millones de km.

    function observar($mensaje){
      echo "<br>Observando la galaxia " . $mensaje;
    }

    class Galaxia{
        function nacimiento(){
            echo "<br>Soy un nueva Galaxia!";
        }
        
        function __construct()
        {
            $this->nacimiento();
        }

        static function muerte($nombre){
            echo "Galaxia " . $nombre . " destruyendose....";
        }
    }