<?php
  require 'database.php';
  session_start();
    if (isset($_POST["boton"])) {
      if (isset($_SESSION['mail'])and isset($_SESSION['password'])) {
        header('location:panel.php');
      }else if (!empty($_POST['email']) && !empty($_POST['password'])) {
          $mail=$_POST['email'];
      $password=$_POST['password'];
   $consulta="SELECT * FROM `usuarios` WHERE `mail` LIKE '$mail' AND `contra` LIKE '$password'";
   $resultado=mysqli_query($conn, $consulta);
    $filas=Mysqli_num_rows($resultado);
      if ($filas>0) {
        $resultado2=mysqli_query($conn,$consulta);
        $mostrar=mysqli_fetch_array($resultado2);
        $_SESSION['usuario']=$mostrar['id_usuarios'];
        $_SESSION['mail']=$mail;
        $_SESSION['password']=$password;
        $message=$mostrar['id_usuarios'];
        mysqli_close($conn);
        header('location:panel.php');
      }else{ 
        $message="mail o contraseña incorrectos";
    }
  }else{
    $message="ingrese datos";
  }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Webgenerator</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Login</h1>
    <span>or <a href="register.php">Crea tu cuenta</a></span>

    <form action="login.php" method="POST">
      <input name="email" type="text" placeholder="ingresa tu Mail">
      <input name="password" type="password" placeholder="ingresa tu Contraseña">
      <input type="submit" name="boton">
    </form>
  </body>
</html>
