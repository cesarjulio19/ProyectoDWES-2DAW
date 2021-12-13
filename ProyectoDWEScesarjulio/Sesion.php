<?php

require_once "Usuario.php";
require_once "bd.php";

class Sesion{
    private static ?Sesion $instancia = null;

    private function __clone(){}
    private function __construct(){}

    public static function getSesion():Sesion {

        if(self::$instancia==null){
            self::$instancia = new Sesion;
        }

        return self::$instancia;

    }

    public function login(string $email, string $pass):bool{

        $usuario = Usuario::searchByEmailAndPass($email,$pass);

        if(!is_null($usuario)){
            $sql = "SELECT * FROM usuario WHERE email = '$email' AND ContrUsu = '".md5($pass)."' ;";
            $db = Database::getInstancia();
            $r = $db->consulta($sql)->recuperar();
            session_start();
            $_SESSION["_user"] = $r->UsuAdmin;
            $_SESSION["time"]  = time() ;
            $_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");
            header("Location:main.php") ;
            die() ;
        }
        return false ;
    }


}