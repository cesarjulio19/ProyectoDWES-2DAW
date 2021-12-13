<?php

	require_once "Platos.php" ;
	$id = $_GET["id"]??"" ;
	$plato = Platos::searchShowById($id) ;
    $nombre = $_POST["nom"]??"" ;
    $desc = $_POST["desc"]??"" ;
    $precio = $_POST["pre"]??"" ;
    $cat = $_POST["cat"]??"" ;

    if($nombre!="" and $desc!="" and $precio!="" and $cat!=""){
        if(Platos::EditarPla($nombre,$desc,$precio,$cat,$id)){
          $error = "No se ha podido añadir el plato" ;
        } 
      }
 
	require_once "head.php" ;
?>

<html>
    <body>
    <h1 class="name">Restaurante Los Martín</h1>
    <form method="post">
        <h1>Edita El Plato</h1>
        <div class="mb-3">
    <label for="nom" class="form-label">Nombre Plato</label>
    <input type="text" class="form-control" id="nom" aria-describedby="emailHelp" name="nom" value="<?= $plato->NomPla ?>" required>
  </div>
  <div class="mb-3">
    <label for="desc" class="form-label">Descripción</label>
    <input type="text" class="form-control" id="desc" name="desc" value="<?= $plato->DesPla ?>" required>
  </div>
  <div class="mb-3">
    <label for="pre" class="form-label">Precio</label>
    <input type="number" class="form-control" id="pre" name="pre" step="0.01" min="0" max="100" value="<?= $plato->PrecPla ?>" required>
  </div>
  <div class="mb-3">
    <label for="cat" class="form-label">Categoria</label>
    <input type="number" class="form-control" id="cat" name="cat" value="<?= $plato->IdCat ?>" required>
  </div>
  

  <?php if (isset($error)): ?>

<div class="row mt-2">
  <div class="col-sm-6 mx-auto">
    <div class="alert alert-danger"><?= $error ; ?></div>
  </div>
</div>

<?php endif ; ?>
  
  <button type="submit" class="btn btn-primary">Guardar</button>
  <a href="main.php" class="btn btn-primary">Cancelar</a>
  
</form>

<div class="log" >
   <img src="imagenes/logo.jpg"  />
   </div>


    </body>
</html>