<!doctype html>
<html lang="es">

<head>
  <?php require "app/views/parts/head.php" ?>
</head>

<body>

  <?php require "app/views/parts/header.php" ?>

  <main role="main" class="container">
    <div class="starter-template">

    <h1>Edición de Producto</h1>

    <form method="post" action="<?= PATH."/product/update"?>">
        <input type="hidden" name="id"
        value="<?php echo $product->id ?>">

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="name" class="form-control"
        value="<?php echo $product->name ?>"
        >
    </div>
    <div class="form-group">
        <label>Precio</label>
        <input type="text" name="precio" class="form-control"
        value="<?php echo $product->precio ?>"
        >
    </div>
    <div class="form-group">
        <label>Fecha Compra</label>
        <input type="text" name="fecha_compra" class="form-control"
        value="<?php echo $product->fecha_compra->format('Y-m-d') ?>"
        >
    </div>    
    <button type="submit" class="btn btn-default">Enviar</button>
    </form>
  </div>

  </main><!-- /.container -->
  <?php require "app/views/parts/footer.php" ?>


</body>
<?php require "app/views/parts/scripts.php" ?>

</html>