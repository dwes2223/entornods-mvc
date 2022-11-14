<!doctype html>
<html lang="es">
<head>
  <?php require "app/views/parts/head.php" ?>
</head>
<body>

  <?php require "app/views/parts/header.php" ?>

  <main role="main" class="container">
    <div class="starter-template">
      <h1>Login</h1>
      <form action="<?= PATH."/login/login"?>" method="post">
        <div class="form-group">
            <label for="formGroupExampleInput">Email</label>
            <input type="email" class="form-control" id="formGroupExampleInput" placeholder="email" name="email">
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput">Password</label>
            <input type="password" class="form-control" id="formGroupExampleInput"   name="password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    
    </div>
    <div>
    <br/>
      <p><?php echo $_SESSION['message']?></p>
    </div>
    </div>
  </main>
  <?php require "app/views/parts/footer.php" ?>


</body>
  <?php require "app/views/parts/scripts.php" ?>
</html>
