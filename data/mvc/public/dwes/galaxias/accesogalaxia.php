<?php
  namespace Dwes\Galaxias;

  include "galaxia1.php";

  echo "<h3>Acceso sin cualificar</h3>";
  //esta en el mismo namespace , no hace falta referenciarlo de ninguna manera especial  
  observar("Via Lactea"); //acceso al metodo de la clase  
  $gl = new Galaxia(); //crear objeto de la clase.
  echo "<br>Radio de la galaxia : " . RADIO;
  Galaxia::muerte("Via Lactea"); //acceso a elemento estatico


  echo "<h3>Acceso Cualificado</h3>";
  //Direccionamiento relativo a mi ubicación
  include "pegaso/pegaso.php";
  Pegaso\observar("Pegaso"); //acceso al metodo de la clase  
  $gl = new Pegaso\Galaxia(); //crear objeto de la clase.
  echo "<br>Radio de la galaxia : " . Pegaso\RADIO;
  Pegaso\Galaxia::muerte("Pegaso"); //acceso a elemento estatico

  echo "<h3>Acceso Totalmente Cualificado</h3>";
  //Direccionamiento absoluto a mi ubicación  
  \Dwes\Galaxias\Pegaso\observar("Pegaso"); //acceso al metodo de la clase  
  $gl = new \Dwes\Galaxias\Pegaso\Galaxia(); //crear objeto de la clase.
  echo "<br>Radio de la galaxia : " . \Dwes\Galaxias\Pegaso\RADIO;
  \Dwes\Galaxias\Pegaso\Galaxia::muerte("Pegaso"); //acceso a elemento estatico

  echo "<h3>Acceso Individual con USE</h3>";
  //include_once "galaxia1.php";
  use const \Dwes\Galaxias\RADIO;
  echo "<br>El radio de la galaxia es : " . RADIO;

  //Apodar namespace
  echo "<h3>Apodar Namespace</h3>";
  use \Dwes\Galaxias\Pegaso as Seiya;
  //use \Dwes\Galaxias as Seiya;  //puedo establecer el alias en el nivel que quiera
  Seiya\observar("Soy Seiya");



