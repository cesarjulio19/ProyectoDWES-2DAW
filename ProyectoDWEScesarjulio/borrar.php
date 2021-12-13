<?php
$id = $_GET["id"]??"" ;

require_once "Platos.php";

Platos::Borrar($id);
if(Platos::Borrar($id)){
    header("Location:main.php") ;
}else{
    echo "no se ha podido borrar correctamente";
    ?>
    <a href="salir.php" class="btn btn-primary">salir</a>
    <?php
}
?>