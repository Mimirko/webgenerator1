<?php
  require 'database.php';
    $message = '';
    if (isset($_GET["boton"])) {
if ($_GET['password'] == $_GET['confirm_password']) {
          $mail=$_GET['email'];
      $password=$_GET['password'];
      $usuario=$_GET['user'];
    $consulta="SELECT * FROM `usuarios` WHERE `mail` LIKE '$mail' ";
    $resultado=mysqli_query($conn, $consulta);
    $filas=Mysqli_num_rows($resultado);
      if ($filas>0) {
      $message="Mail ya ingresado o usuario ya ingresado";
      }else{
     if (!empty($_GET['email']) && !empty($_GET['password'])) {
      $Fecha=shell_exec('date');
          $sql = "INSERT INTO usuarios
           (id_usuarios, mail, contra, fecha_date) 
           VALUES
            ('$usuario', '$mail', '$password', '$Fecha')";
            $resultado=mysqli_query($conn,$sql);
            if (!$resultado) {
              $message= "no se pudo registrar $resultado".$conn->error;
            }else{
              $message = 'Usuario creado correctamente';
              mysqli_close($conn);
            }

            } else {
          $message = 'ingrese datos';
        }

   }
 }else{
    $message= 'Contraseñas desiguales';

  }
}else{
  $message= 'ingrese datos';

}
 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>SignUp</h1>
    <span>or <a href="login.php">Login</a></span>

    <form action="register.php" method="GET">
             <input name="user" type="text" placeholder="ingresa nombre de usuario">
       <input name="email" type="text" placeholder="ingresa un email">
      <input name="password" type="password" placeholder="Enter your Password">
      <input name="confirm_password" type="password" placeholder="Confirm Password">
      <input type="submit" name="boton">
    </form>

  </body>
</html>
