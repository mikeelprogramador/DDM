<?php

class Login {

    /**
     * Funcion para ingresar a un nuevo usuario
     */
    public static function registrar($nombre,$apellido,$email,$password){
        $salida = 0;
        include("bd-conect/inclucion-bd.php");
        require_once("cajon/bootstrap/bootstrap.php");
        $estilo = new estilo($password);
        $newPwd = $estilo->imprimir();
        $parche = Login::inicio($email,$password);
        if($parche == 0){
            $sql = "INSERT INTO tb_usuarios(nombre,apellido,email,pasword)VALUES('$nombre','$apellido','$email','$newPwd')";
            $consulta = $conexion->query($sql);
            if($consulta){
                $salida += 1;
            }}
        else{
            $salida += 0;   
        }
        return $salida; 
    }
        

    public static function inicio($email,$password){
        $salida = 0;
        include("bd-conect/inclucion-bd.php");
        require_once("cajon/bootstrap/bootstrap.php");
        $estilo = new estilo($password);
        $newPwd = Login::pwd($email);
        if($estilo->texto($password,$newPwd)){
            $sql = "select * from tb_usuarios where email='$email' and pasword='$newPwd'";
            $consulta = $conexion->query($sql);
            if($conexion->affected_rows > 0){
             $salida += 1;
            }else{
                $salida += 0;
            }
        }else{
            // echo "Clave incorrecta";
        }
        return $salida;
    }

    private static function pwd($email){
        $salida = "";
        include("bd-conect/inclucion-bd.php");
        $sql = "select * from tb_usuarios where email='$email'";
        $consulta = $conexion->query($sql);
        while($fila= $consulta->fetch_array()){
            $salida .= $fila[3];
        }
        return $salida; 
    }

}
