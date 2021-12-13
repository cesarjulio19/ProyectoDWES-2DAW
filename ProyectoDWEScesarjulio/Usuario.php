<?php
require_once "bd.php";


class usuario {
    private $IdUsu;
    private $NomUsu;
    private $ApeUsu;
    private $FechNac;
    private $email;
    private $ContrUsu;
    private $Direc;
    private $UsuAdmin;

    public static function searchByEmailAndPass(string $email,string $ContrUsu):?Usuario{

        $db = Database::getInstancia();
        $total = $db->consulta("SELECT * FROM usuario WHERE email='$email' AND ContrUsu='".md5($ContrUsu)."' ;")->total();

        return ($total)?$db->recuperar("Usuario"):null ;


    }

    public static function AnadirUsu (string $ema,string $pass,string $nombre,string $apellido,string $FechNac,string $direccion):bool{
        $db = Database::getInstancia();
        $sql="INSERT INTO usuario (NomUsu,ApeUsu,FechNac,email,ContrUsu,Direc) VALUES ('$nombre','$apellido','$FechNac','$ema','".md5($pass)."','$direccion')";
        $resultado= $db->reconsulta( $sql );
        if($resultado==true){
            header("Location:index.php") ;
        }

        return false;
    }






    

}
?>