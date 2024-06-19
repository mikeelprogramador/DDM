<?php

class Adim{

    public static function verificarPerfil($id_user){
        include_once("modelo.php");
        $salida = 0;
        $consulta = Model::sqlVerificarPerfil($id_user);
        while($fila = $consulta->fetch_array()){
            $salida = $fila[0];
        }
        return $salida; 
    }
}