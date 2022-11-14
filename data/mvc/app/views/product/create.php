<!doctype html>
<html lang="es">

<head>
  <?php require "app/views/parts/head.php" ?>
</head>

<body>

  <?php require "app/views/parts/header.php" ?>

  <main role="main" class="container">
    <div class="starter-template">

    <h1>Alta de Producto</h1>

    <form method="post" action="<?= PATH."/user/store"?>">

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label>Precio</label>
        <input type="text" name="precio" class="form-control">
    </div>
    <div class="form-group">
        <label>Fecha Compra</label>
        <input type="text" name="fecha_compra" class="form-control">
    </div>    
    <button type="submit" class="btn btn-default">Enviar</button>
    </form>    
  </div>

  </main><!-- /.container -->
  <?php require "app/views/parts/footer.php" ?>


</body>
<?php require "app/views/parts/scripts.php" ?>

</html>