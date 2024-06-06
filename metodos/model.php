<?php

class model{
    
    public static function modelRegistar($id,$nombre,$apellido,$email,$newPwd){
        include("bd-conect/inclucion-bd.php");
        $sql = "INSERT INTO tb_usuarios(id_user,nombre,apellido,email,pasword,fecha_registro)VALUES('$id','$nombre','$apellido','$email','$newPwd',now())";
        $consulta = $conexion->query($sql);
        return $consulta;
    }

    public static function sesion($email,$newPwd){
        include("bd-conect/inclucion-bd.php");
        $sql = "select * from tb_usuarios where email='$email' and pasword='$newPwd'";
        $consulta = $conexion->query($sql);
        return $consulta;
    }

    public static function correo($email){
        include("bd-conect/inclucion-bd.php");
        $sql = "select * from tb_usuarios where email='$email'";
        $consulta = $conexion->query($sql);
        return $consulta;
    }

    public static function codigo(){
        include("bd-conect/inclucion-bd.php");
        $sql = "select count(id_user) from tb_usuarios ";
        $consulta = $conexion->query($sql);
        return $consulta; 
    }

    public static function modelEncontrarId($email){
        include("bd-conect/inclucion-bd.php");
        $sql = "select id_user from tb_usuarios where email='$email' ";
        $consulta = $conexion->query($sql);
        return $consulta;
    }

}