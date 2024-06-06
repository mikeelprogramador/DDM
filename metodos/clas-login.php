<?php

class Login {

    /**
     * Funcion para ingresar a un nuevo usuario
     */
    public static function registrar($nombre,$apellido,$email,$password){
        $salida = 0;
        require_once("model.php");
        require_once("cajon/bootstrap/bootstrap.php");
        $estilo = new estilo($password);//Cambia la calve
        $newPwd = $estilo->imprimir();//la almacena en etsa variable
        $parche = Login::inicio($email,$password);//verica si el usuario ya esta cerado
        $id = Login::id();///Se le crea un id
        if($parche == 0){
            $resultado = model::modelRegistar($id,$nombre,$apellido,$email,$newPwd);
            if($resultado){
                $caht = id::encriptar($id);
                header("location: view/user/controlador.php?seccion=seccion1&caht='$caht'");
            }}
        else{
            $salida += 0;   
        }
        return $salida; 
    }
        
    /**
     * Funcion para inicar sesion
     */
    public static function inicio($email,$password){
        $salida = 0;
        require_once("model.php");
        require_once("cajon/bootstrap/bootstrap.php");
        $estilo = new estilo($password);
        $newPwd = Login::pwd($email);
        if($estilo->texto($password,$newPwd)){
            $resultado = model::sesion($email,$newPwd);
            if($resultado->num_rows > 0){
                $id = Login::encontraUser($email);
                $caht = id::encriptar($id);
                header("location: view/user/controlador.php?seccion=seccion1&caht='$caht'");
            }else{
                $salida += 0;
            }
        }else{
             //echo "Clave incorrecta";
        }
        return $salida;
    }
    /**
     * Funcion que retorna la contrasña que esta en la base de datos
     */
    private static function pwd($email){
        $salida = "";
        require_once("model.php");
        $resultado = model::correo($email);
        while($fila= $resultado->fetch_array()){
            $salida .= $fila[4];
        }
        return $salida; 
    }
    /**
     * Esta funcion le genera un id para usuarios nuevos
     */
    private static function id(){
        $salida = 0;
        require_once("model.php");
        $resultado = model::codigo();
        while($fila= $resultado->fetch_array()){
            $salida += $fila[0]+1;
        }
        return $salida; 
    }

    private static function encontraUser($email){
        require_once("model.php");
        $salida = 0; 
        $resultado = model::modelEncontrarId($email);
        while($fila = $resultado->fetch_array()){
            $salida = $fila[0];
        }
        return $salida; 
    }

}
