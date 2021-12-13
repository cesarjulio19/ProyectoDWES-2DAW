<?php

$ema = $_POST["email"]??"" ;
$pas = $_POST["pass"]??"" ;

require_once "Sesion.php" ;

if ($ema!="" and $pas!==""):
  $sesion = Sesion::getSesion() ;
  if (!$sesion->login($ema, $pas)) $error = "el email o la contraseña son incorrectas" ;
endif;

require_once "head.php";

?>

<html>
    <body>
    <h1 class="name">Restaurante Los Martín</h1>
    <form method="post">
        <h3>Inicia Sesión</h3>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
  </div>
  <div class="mb-3">
    <label for="pass" class="form-label">Password</label>
    <input type="password" class="form-control" id="pass" name="pass">
  </div>

  <?php if (isset($error)): ?>

<div class="row mt-2">
  <div class="col-sm-6 mx-auto">
    <div class="alert alert-danger"><?= $error ; ?></div>
  </div>
</div>

<?php endif ; ?>

  <button type="submit" class="btn btn-primary">Enviar</button>
  <a href="registro.php" class="btn btn-primary">Registrate!</a>
  
</form>

   <div class="logo" >
   <img src="imagenes/logo.jpg"  />
   </div>



    </body>
</html>