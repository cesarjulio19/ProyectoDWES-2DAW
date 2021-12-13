<?php
require_once "head.php";
require_once "Platos.php";
require_once "Categoria.php";


session_start();

$datosp = Platos::searchAllShows();
$datosc = Categoria::searchAllShows();

if (!isset($_SESSION["_user"])){
  header("Location: salir.php") ;
} else{
   //sino, calculamos el tiempo transcurrido
   $fechaGuardada = $_SESSION["ultimoAcceso"];
   $ahora = date("Y-n-j H:i:s");
   $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));

   //comparamos el tiempo transcurrido
    if($tiempo_transcurrido >= 600) {
    //si pasaron 10 minutos o más
     header("Location: salir.php"); //envío al usuario a la pag. de autenticación
     //sino, actualizo la fecha de la sesión
   }else {
   $_SESSION["ultimoAcceso"] = $ahora;
  }

}


		







?>



<body>
    
<a href="salir.php" class="btn btn-primary">salir</a>
<?php
if($_SESSION["_user"]==1){
?>
<a href="anadir.php" class="btn btn-primary">Añadir</a>
<?php
}
?>

    <?php
    if(empty($datosp) and empty($datosc)):
    ?>
    <div class="alert alert-info">
			No se han encontrado registros
	</div>
    <?php
      else:
        $p=0;
        $c=0;

        while($c<count($datosc)):
        ?>
        <h1 class="cat"><?php echo $datosc[$c]->NomCat?> </h1>
        <div class="accordion" id="accordionPanelsStayOpenExample">
        <?php while($p<count($datosp)):
            if(($datosp[$p]->IdCat) == ($datosc[$c]->IdCat)):
                //acordeón con los platos
        ?>

        <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
      <button  class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
        <?php echo $datosp[$p]->NomPla?>
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
      <div class="accordion-body">
        <strong><?php echo $datosp[$p]->DesPla ?></strong> Precio: <?php  echo $datosp[$p]->PrecPla?> 
        <?php
          if($_SESSION["_user"]==1){
        ?>
        <a href="borrar.php?id=<?= $datosp[$p]->IdPla ?>" class="btn btn-primary">Borrar</a> <a href="editar.php?id=<?= $datosp[$p]->IdPla ?>" class="btn btn-primary">Editar</a>
        <?php
          }
        ?>
      </div>
    </div>
  </div>
  <?php
    $p++;
            else:
                $p++;
            endif;
        endwhile;
        echo "</div>" ;
        $c++;
        $p=0;
    endwhile;
endif;


  ?>


<?php


?>



        



 </body>
