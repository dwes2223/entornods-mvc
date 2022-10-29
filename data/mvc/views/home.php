<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <!-- Muestra todos los productos disponibles -->
   <h1>Inventario de Productos</h1>
   <table>
        <?php foreach($products as $item):?>
            <tr>
              <td><?= "Identificador : " . $item[0]; ?></td>
              <td><?= "Nombre : " . $item[1]; ?></td>
              <!-- ? metodo=valor  && variable1 = valor1 && variable2 = valor2 .. -->
              <td> <a href="?method=show&id=<?= $item[0]?>">Ver detalle</a></td>
            </tr>
        <?php endforeach; ?>
   </table>    
</body>
</html>