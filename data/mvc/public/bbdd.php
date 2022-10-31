<?php

  require_once "../bbddcon.php";
        
      $sql = "SELECT nombreusu,password FROM login"; //prepara sentencia sql
      $registros = $bd->query($sql);  //ejecuta sentencia
      
      echo "<br>Numero de filas devuelto : " . $registros->rowCount();
      echo "<br>Listado de filas" ;
      foreach ($registros as $fila) {
          echo "<br>Nombre usuario " . $fila["nombreusu"];
          echo "<br>Contraseña usuario " . $fila["password"];    
      }      