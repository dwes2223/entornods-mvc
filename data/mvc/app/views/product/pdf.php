<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        h1{
            color: red;
        }
        table, tr, td, th {
            border: solid 1px black;
            border-collapse: collapse;
        }
        table {
            width: 80%;
        }
    </style>
    <title>Document</title>
</head>
<body>
    
<h1>Lista de usuarios</h1>
<table class="table table-striped table-hover">
<tr>
    <th>Nombre</th>
    <th>Apellidos</th>
    <th>Precio</th>
    <th>Fecha Compra</th>
</tr>

<?php foreach ($products as $key => $product) { ?>
    <tr>
    <td><?php echo $product->name ></td>
    <td><?php echo $product->precio ?></td>    
    <td><?php echo $product->fecha_compra ? $product->fecha_compra->format('d-m-Y') : 'no comprado' ?></td>
    </tr>
<?php } ?>
</table>
</body>
</html>
