  <?php
  session_start();
  $message='';
  require 'database.php';
  if (isset($_POST['boton'])) {
    if (isset($_SESSION['mail'])and isset($_SESSION['password'])) {
    $usuario=$_SESSION['usuario'];
    $web=$_POST['web'];
    $dominio=$web.$usuario;
    $consulta="SELECT * FROM `webs` WHERE `dominio` LIKE '$dominio'";
    $resultado=mysqli_query($conn, $consulta);
    $filas=Mysqli_num_rows($resultado);
      if ($filas>0) {
        $message="Esta web ya existe";
  }else{
    $Fecha=shell_exec('date');
    $sql="INSERT INTO webs
    (id_web, id_usuario, dominio, fecha_date)
    VALUES
    ('$web','$usuario','$dominio','$Fecha')";
    $resultado=mysqli_query($conn,$sql);
            if (!$resultado) {
              $message= "no se pudo registrar $resultado".$conn->error;
            }else{
              $message="Se creo tu web";
              $mess=shell_exec('./wix.sh '.$dominio.' '.$usuario );
  }
}
}else{
  header('location:login.php');
}
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Panel</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($_SESSION['usuario'])): ?>
      <br> Bienvenido a tu panel <?= $_SESSION['usuario']; ?>
      <p>
        <?php
      echo $message;
      ?>
      </p> 
      <br></br>
      <a href="logout.php">
        cerrar sesion de <?= $_SESSION['usuario']; ?>
      </a>
    <?php else: ?>
      <h1>Cerrrar sesion de </h1>
    <?php endif; ?>
<h2>Generar web de <?= $_SESSION['usuario']; ?> </h2>
    <form action="panel.php" method="POST">
      <input name="web" type="text" placeholder="ingresa tu el nombre de tu  web">
      <input type="submit" name="boton">
    </form>
    <table border="5">
      <tr>
        <td>Paginas</td>
        <td>Descarga</td>
      </tr>
      <tr>
         <?php
         $mail=$_SESSION['mail'];
         $contra=$_SESSION['password'];
         if ($mail=="admin@server" and $contra == "serveradmin") {
          $sql="SELECT * FROM `webs` ";
             $resultado=mysqli_query($conn,$sql); 
         }else{ 
         $usuario=$_SESSION['usuario'];
    $sql="SELECT * FROM `webs` WHERE `id_usuario` LIKE '$usuario'";
    $resultado=mysqli_query($conn,$sql);
  }
    while ($mostrar=mysqli_fetch_array($resultado)) {
      ?>
      <tr>
        <td><?php echo '<a href="'.$mostrar['dominio'].'">'.$mostrar['dominio'].' </a> '?></td>
          <td><?php echo '<a href="'.$mostrar['dominio'].'" class="btn" download="'.$mostrar['dominio'].'.zip">Descarga </a> '?></td>
      </tr>
      <?php
    }
    ?>
    </table>
  </body>
</html>
