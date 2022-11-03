<!DOCTYPE html>
<!--  Sacado de https://phppot.com/bootstrap/bootstrap-sticky-navbar/ -->
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
	rel="stylesheet">
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
.container {
    height: 1000px;
}
</style>
<body>
    
     <?php require "../app/views/header.php" ?>


    <div class="container">
        <div class="row">
            <div class="col-12 py-4">
                <h1>Menu Principal</h1>
                Esta es el menu principal de la aplicacion.
            </div>
        </div>
    </div>
    <?php require "../app/views/footer.php" ?>
</body>
</html>
   
