<?php

require_once "bd.php" ;

class Categoria{

    private $IdCat;
    private $NomCat;

    public function __get($key) {
        if (property_exists("Categoria", $key)) return $this->$key ;
        throw new Exception ;
    }

    public static function searchShowById($id):?Categoria
	{
		$db = Database::getInstancia() ;
		$db->consulta("SELECT * FROM Categoria WHERE IdCat=$id ;") ;
		return $db->recuperar("Categoria") ;
	}

    public static function searchAllShows():array
	{

		$db = Database::getInstancia() ;
		$db->consulta("SELECT * FROM categoria ;") ;

		return $db->recuperarTodos("Categoria") ;			
	}

	public static function AnadirCat ( $nombre):bool{
        $db = Database::getInstancia();
        $sql="INSERT INTO categoria (NomCat) VALUES ('$nombre');";
        $resultado= $db->reconsulta( $sql );
        if($resultado==true){
            header("Location:main.php") ;
        }

        return false;
    }


}