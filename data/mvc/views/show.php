<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <h1>Detalle de Producto</h1>
    <li>
      <strong>Id Producto: </strong>
      <?= $product[0] ?>
    </li>    
    <li>
      <strong>Nombre Producto: </strong>
      <?= $product[1] ?>
    </li>
    <br><hr>
    <a href="?method=home">Listado Total</a>
    
</body>
</html>