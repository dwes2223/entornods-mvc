INCONVENIENTES MODELO ACTUAL

 - Si tenemos multiples controladores cada uno de ellos supone una entrada
 en la aplicación.

 - Necesidad de crear una unica entrada para:
   + Filtrar peticiones.
   + Inicios de sesión (autorización de usuarios)

SOLUCION : Crear Controlador Frontal (Front Controller)/ Enrutador

 - Objetivos:

   + Cualquier peticion a un fichero inexistente llegue al controlador
     frontal para su tratamiento

   + ENRUTAMIENTO: Dependiendo de la ruta recibida cargará un controlador u otro.
     (y ejecutará los metodos apropiados).

  + Tener en cuenta la "amigabilidad" de las rutas hacia el usuario (user frindely)

  Ejemplos: 
    http://mvc.local?method=show&&id=5   vs  http://mvc.local/show/5

    http://mvc.local/index.php?controller=product&&method=home  vs

    http://mvc.local/product/home

     Para ello realizaremos los siguiente:
     
     El usuario escribira: 
         http://mvc.local/product/show  , y el sistema interpretara:

         http://mvc.local/index.php?url=product/show
    
    Para implementar las url para que sean user friendly se necesitan:
     1-  La presencia del modulo mod_rewrite en Apache -> ya hecho.
     2-  la  reescritura de las urls => Fichero .htaccess.


    #activar motor de reescritura
    RewriteEngine On      
    # No sobreescribir directorios o ficheros si existen
    #importante para css, js, imágenes, ...
    RewriteCond %{SCRIPT_FILENAME} !-d 
    RewriteCond %{SCRIPT_FILENAME} !-f     
    #Regla de reescritura de la url    
    RewriteRule ^(.*)$ index.php?url=$1 [QSA,L]

    QSA= query string add . Añade a la cadena de consulta al url sustituta.
    L= last.  Finaliza el procesamiento de reglas

