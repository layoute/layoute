<?php
session_start();

if (isset($_SESSION['persona'])) {
  header('Location: pages/principal.php');
}

include "php/conne.php";
include "php/CrudSocios.php";
include "php/login/Validacion.php";
include "php/login/login.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="lte/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="lte/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">

  <div class="login-box">
    <!-- /.login-logo -->
    <div class="alerta">
      <?php echo $m ?>
    </div>
    <div class="card card-outline card-success">
      <div class="card-header text-center">
        <a href="#" class="h1"><b>Iniciar sesión</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">por favor inicie sesión</p>
        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Correo electrónico">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="contraseña">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <button type="submit" name="submit" class="btn btn-success btn-block">
                <i class="fas fa-sign-in-alt mx-1"></i>
                Ingresar</button>
            </div>
          </div>
        </form>
        <!-- /.social-auth-links -->
        <p class="mb-1 mt-3 text-center">
          <a href="#">¿No recuerda su contraseña?</a>
        </p>
        <p class="mb-0 text-center">
          <a href="php/registrar.php">¡Registrate ahora!</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="lte/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="lte/dist/js/adminlte.min.js"></script>
</body>

</html>