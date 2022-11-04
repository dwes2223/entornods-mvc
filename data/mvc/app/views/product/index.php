<!doctype html>
<html lang="es">

<head>
  <?php require "app/views/parts/head.php" ?>
</head>

<body>

  <?php require "app/views/parts/header.php" ?>

  <main role="main" class="container">
    <div class="starter-template">
      <h1>Lista de Productos</h1>

      <table class="table table-striped table-hover">
        <tr>
          <th>Numero Producto</th>
          <th>Nombre</th>
          <th>Precio</th>
          <th>Fecha de Compra</th>
          <th></th>
        </tr>

        <?php foreach ($products as $key => $product) { ?>
          <tr>
          <td><?php echo $product->id ?></td>
          <td><?php echo $product->name ?></td>
          <td><?php echo $product->precio ?></td>
          <td><?php echo $product->fecha_compra ? $product->fecha_compra->format('d-m-Y') : 'no comprado' ?></td>
          <td>
            <a href="<?= PATH."/product/show/".$product->id ?>" class="btn btn-primary">Ver </a>
          </td>
          </tr>
        <?php } ?>
      </table>

    </div>

  </main><!-- /.container -->
  <?php require "app/views/parts/footer.php" ?>


</body>
<?php require "app/views/parts/scripts.php" ?>

</html>