<?php

$m = "";

if (isset($_POST['submit'])) {

  $email = $_POST['email'];
  $password = $_POST['password'];

  if (empty($email) && empty($password)) {
    $m = "<div class='alert alert-danger alert-dismissible'>
    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
    <h5><i class='icon fas fa-ban'></i> Alert!</h5>
    Nombre de usuario o contraseña vacio
    </div>";
  } else {
    $user = new Validacion();
    $res = $user->getUser($email, $password);
    if ($res) {
      $persona = $user->single_record($email);
      session_start();
      $_SESSION['persona'] = $persona;
      header('Location: pages/principal.php');
    } else{
      $m = "<div class='alert alert-danger alert-dismissible'>
      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
      <h5><i class='icon fas fa-ban'></i> Alert!</h5>
      Ingrese los datos correctamente
      </div>";
    }
  }
}

?>
