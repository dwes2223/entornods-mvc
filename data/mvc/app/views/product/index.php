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
      <p>
      <a href="<?= PATH."/product/create" ?>" class="btn btn-primary">Nuevo</a>
      <a href="<?= PATH."/product/pdf" ?>" class="btn btn-primary">Pdf</a>        
      </p>
      <table class="table table-striped table-hover">
        <tr>
          <th>Nombre</th>
          <th>Precio</th>          
          <th>Fecha de Compra</th>
          <th></th>
        </tr>

        <?php foreach ($products as $key => $product) { ?>
          <tr>
          <td><?php echo $product->name ?></td>
          <td><?php echo $product->precio ?></td>          
          <td><?php echo $product->fecha_compra ? $product->fecha_compra->format('d-m-Y') : 'no comprado' ?></td>
          <td>
            <a href="<?= PATH."/product/show/".$product->id ?>" class="btn btn-primary">Ver </a>
            <a href="<?= PATH."/product/edit/".$product->id ?>" class="btn btn-primary">Editar </a>
            <a href="<?= PATH."/product/delete/".$product->id ?> ?>" class="btn btn-primary">Borrar </a>
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