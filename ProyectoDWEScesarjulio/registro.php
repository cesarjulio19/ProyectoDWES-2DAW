<?php
require_once "head.php";
require_once "Usuario.php";



$ema = $_POST["email"]??"" ;
$pas = $_POST["pass"]??"" ;
$nombre = $_POST["nombre"]??"" ;
$apellido = $_POST["ape"]??"" ;
$FechNac = $_POST["fech"]??"" ;
$direccion = $_POST["dir"]??"" ;

if($ema!="" and $pas!="" and $nombre!="" and $apellido!="" and $FechNac!=""){
  if(Usuario::AnadirUsu($ema,$pas,$nombre,$apellido,$FechNac,$direccion)){
    $error = "No se ha podido realizar el registro correctamente" ;
  } 
}



?>

<html>
    <body>
    <h1 class="name">Restaurante Los Martín</h1>
    <form method="post">
        <h1>Registrate ya!</h1>
        <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" required>
  </div>
  <div class="mb-3">
    <label for="pass" class="form-label">Password</label>
    <input type="password" class="form-control" id="pass" name="pass" required>
  </div>
  <div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" required>
  </div>
  <div class="mb-3">
    <label for="ape" class="form-label">Apellidos</label>
    <input type="text" class="form-control" id="ape" name="ape" required>
  </div>
  <div class="mb-3">
    <label for="fech" class="form-label">Fecha Nacimiento</label>
    <input type="date" class="form-control" id="fech" name="fech" required>
  </div>
  <div class="mb-3">
    <label for="dir" class="form-label">Dirección</label>
    <input type="text" class="form-control" id="dir" name="dir">
  </div>

  <?php if (isset($error)): ?>

<div class="row mt-2">
  <div class="col-sm-6 mx-auto">
    <div class="alert alert-danger"><?= $error ; ?></div>
  </div>
</div>

<?php endif ; ?>
  
  <button type="submit" class="btn btn-primary">Enviar</button>
  <a href="index.php" class="btn btn-primary">Inicia Sesión</a>
  
</form>

<div class="log" >
   <img src="imagenes/logo.jpg"  />
   </div>


    </body>
</html>