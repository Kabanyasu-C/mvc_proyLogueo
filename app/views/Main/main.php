<?php defined('BASEPATH') or exit('No se permite acceso directo'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="estilos/estilos.css">
</head>
<body>

  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Developero</a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $email ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/php-mvc/main/logout">Cerrar sesión</a></li>
          </ul>
        </li>
      </ul>

    </div>
  </nav>

  <div class="container">
    
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container text-center">
        <h1>Sesión iniciada</h1>
        <p>Puedes registrar a mas.</p>
      </div>
        <form action="Main" method="POST">
  <label>Correo</label>
  <input type="text" name="user" placeholder="Usuario">
  <label>Contraseña</label>
  <input type="password" name="password" placeholder="Contraseña">
  <label>Confirmar contraseña</label>
  <input type="password" name="confirm-password" placeholder="Confirmar Contraseña">
  <center>
  <input type="submit" value ="Registrar" class="btn btn-success" name="btn-registrar" style="width: 50%;">
  </center>
</form>
<?php 
$conexion = new mysqli('localhost','root','','curso-mvc');
$nombre="";
$dir="";
$dir1="";

if (isset($_POST['btn-registrar'])) {
  $nombre = $_POST['user'];
  $dir = $_POST['password'];
  $dir1 = $_POST['confirm-password'];
  
  if($nombre=="" || $dir=="" || $dir1==""){
    echo "Los campos son obligatorios";
  }else{
    //INSERTAR
    if ($dir1==$dir) {
        $pass_cifrado = password_hash($dir, PASSWORD_DEFAULT);
      mysqli_query($conexion, "INSERT INTO usuarios
      (email,password)
      values
      ('$nombre','$pass_cifrado')");
    echo "<h3>Registrado correctamente</h3>";
    }else{
      echo "<h3>Contraseñas Incorrectas</h3>";
    }
    
  }
}
?>
    </div>

  </div>


  <!-- Jquery  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>