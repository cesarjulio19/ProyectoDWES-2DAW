<?php

require_once "bd.php" ;

class Platos{

    private $IdPla;
    private $NomPla;
    private $DesPla;
    private $PrecPla;
    private $IdCat;

    public function __get($key) {
        if (property_exists("Platos", $key)) return $this->$key ;
        throw new Exception ;
    }

    public function __set($key, $value) 
		{			
			switch($key):
				case "nombre"    :
				case "descripcion"     :
				case "precio":
				case "categoria" : 
								break ;
				default: 
					throw new Exception ;
			endswitch ;
		}


    public static function searchShowById($id):?Platos
	{
		$db = Database::getInstancia() ;
		$db->consulta("SELECT * FROM platos WHERE IdPla=$id ;") ;
		return $db->recuperar("Platos") ;
	}

    public static function searchAllShows():array
	{

		$db = Database::getInstancia() ;
		$db->consulta("SELECT * FROM platos ;") ;

		return $db->recuperarTodos("Platos") ;			
	}

    public static function Borrar($id):bool{
        $db = Database::getInstancia() ;
        $sql = "DELETE FROM platos WHERE IdPla=$id;";
        if($db->reconsulta($sql)){
            return true;
        }
        return false;


    }

    public static function AnadirPla ( $nombre, $desc, $precio, $categoria):bool{
        $db = Database::getInstancia();
        $sql="INSERT INTO platos (NomPla,DesPla,PrecPla,IdCat) VALUES ('$nombre','$desc','$precio','$categoria');";
        $resultado= $db->reconsulta( $sql );
        if($resultado==true){
            header("Location:main.php") ;
        }

        return false;
    }

    public function actualizar() 
	{
			$db = Database::getInstancia() ;
			$sql = "UPDATE platos SET NomPla = '{$this->nombre}',DesPla  = '{$this->descripcion}', PrecPla = '{$this->precio}', IdCat = '{$this->categoria}' WHERE IdPla={$this->IdPla}	;" ;

			$db->consulta($sql) ;
	}

    public static function EditarPla ( $nombre, $desc, $precio, $categoria, $id):bool{
        $db = Database::getInstancia();
        $sql="UPDATE platos SET NomPla = '$nombre',DesPla  = '$desc', PrecPla = '$precio', IdCat = '$categoria' WHERE IdPla='$id'	;";
        $resultado= $db->reconsulta( $sql );
        if($resultado==true){
            header("Location:main.php") ;
        }

        return false;
    }



}