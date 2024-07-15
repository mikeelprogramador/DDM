<?php 

class Usuarios{

    public static function verificarPerfil($des,$id_user){
        include_once('../../conf/model.php');
        $salida = "";
        $consulta = Model::sqlVerificarPerfil($des,$id_user);
        while($fila = $consulta->fetch_array()){
            $salida .= $fila[0];
        }
        return $salida;
    }
    /**
     * Metodo actualiza el estado del usuario
     */
    public static function actualizarEstadoUser($des,$id_user){
                include_once("../../conf/model.php");
        $consulta = Model::sqlActualizarEstadoUser($des,$id_user);
    }

    public static function cargarImagen($img,$id_user){
                include_once("../../conf/model.php");
        $consulta = Model::sqlActualizarImagen($img,$id_user);
    }
}