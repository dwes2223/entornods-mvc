<!doctype html>
<html lang="es">

<head>
  <?php require "app/views/parts/head.php" ?>
</head>

<body>

  <?php require "app/views/parts/header.php" ?>

  <main role="main" class="container">
    <div class="starter-template">
      <h1>Detalle del Producto <?php echo $product->id ?></h1>
        <ul>
            <li><strong>Número Producto: </strong><?php echo $product->id ?></li>
            <li><strong>Nombre: </strong><?php echo $product->name ?></li>
            <li><strong>Precio: </strong><?php echo $product->price ?></li>
            <li><strong>Fecha de Compra: </strong><?php echo $product->fecha_compra->format('d-m-Y') ?></li>
        </ul>
    </div>

  </main><!-- /.container -->
  <?php require "app/views/parts/footer.php" ?>


</body>
<?php require "app/views/parts/scripts.php" ?>

</html>