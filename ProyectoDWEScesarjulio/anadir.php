<?php
require_once "head.php";
require_once "Platos.php";
require_once "Categoria.php";



$nombre = $_POST["nombre"]??"" ;
$desc = $_POST["desc"]??"" ;
$precio = $_POST["precio"]??"" ;
$cat = $_POST["cat"]??"" ;
$nombrec = $_POST["nombrec"]??"" ;


if($nombre!="" and $desc!="" and $precio!="" and $cat!=""){
  if(Platos::AnadirPla($nombre,$desc,$precio,$cat)){
    $error = "No se ha podido añadir el plato" ;
  } 
}

if($nombrec!=""){
    if(Categoria::AnadirCat($nombrec)){
      $error1 = "No se ha podido añadir la categoria" ;
    } 
  }



?>

<html>
    <body>
    <h1 class="name">Restaurante Los Martín</h1>
    <form method="post">
        <h1>Añadir Plato</h1>
        <div class="mb-3">
    <label for="nombre" class="form-label">Nombre Plato</label>
    <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp" name="nombre" required>
  </div>
  <div class="mb-3">
    <label for="desc" class="form-label">Descripción Plato</label>
    <input type="text" class="form-control" id="desc" name="desc" required>
  </div>
  <div class="mb-3">
    <label for="precio" class="form-label">Precio</label>
    <input type="number" class="form-control" id="precio" name="precio" step="0.01" min="0" max="100" required>
  </div>
  <div class="mb-3">
    <label for="cat" class="form-label">Categoria</label>
    <input type="number" class="form-control" id="cat" name="cat" required>
  </div>

  <?php if (isset($error)): ?>

<div class="row mt-2">
  <div class="col-sm-6 mx-auto">
    <div class="alert alert-danger"><?= $error ; ?></div>
  </div>
</div>

<?php endif ; ?>
  
  <button type="submit" class="btn btn-primary">Enviar</button>
  <a href="main.php" class="btn btn-primary">Cancelar</a>
  
</form>

<form method="post">
        <h1>Añadir Categoria</h1>
        <div class="mb-3">
    <label for="nombrec" class="form-label">Nombre Categoria</label>
    <input type="text" class="form-control" id="nombrec" aria-describedby="emailHelp" name="nombrec" required>
  </div>
  <?php if (isset($error)): ?>

<div class="row mt-2">
  <div class="col-sm-6 mx-auto">
    <div class="alert alert-danger"><?= $error1 ; ?></div>
  </div>
</div>

<?php endif ; ?>
  
  <button type="submit" class="btn btn-primary">Enviar</button>
  <a href="main.php" class="btn btn-primary">Cancelar</a>
  
</form>

<div class="logo1" >
   <img src="imagenes/logo.jpg"  />
   </div>


    </body>
</html>