<?php
error_reporting(E_ERROR) ;
ini_set("display-errors",0) ;

class Database {
    private static ?Database $instancia=null;
    private $result;
    private $mysqli;

    private function __clone(){}

    private function __construct(){

        $this->mysqli = new mysqli("sql306.epizy.com","epiz_30584897","3gKTyrQMiGI", "epiz_30584897_restaurante") ;

        if ($this->mysqli->connect_errno){
            throw new Exception("No se ha podido establecer conexión con la base de datos") ;
        }

        $this->mysqli->set_charset("utf8") ;
    }

    public static function getInstancia(){
        if (self::$instancia==null){

            self::$instancia = new Database ;
        }
        return self::$instancia ;
    }

    public function consulta(string $sql ):Database{

        $this->result = $this->mysqli->query($sql) ;

        return $this ;
    }

    public function reconsulta(string $sql ):bool{

        if($this->mysqli->query($sql)){
            return true;
        }

        return false;
    }

    public function recuperar(string $class = "StdClass"){

        return $this->result->fetch_object($class) ;
    }

    public function recuperarTodos(string $clas = "StdClass"):array {

        $datos = [] ;

        while($item = $this->recuperar($clas)){
            array_push($datos, $item) ;
        }
            
        return $datos ;
    }

    public function total():?int {
        return $this->result->num_rows ;
    }

    public function __destruct() {
        $this->mysqli->close() ;			
    }
}
?>