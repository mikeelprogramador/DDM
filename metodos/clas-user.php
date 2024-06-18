<?php
class Productos{
    public static function CrearComentarios($comentario,$id_producto,$id_usuario){
        include_once("modelo.php");
        $salida = 0;
        $consulta = Model::sqlComentarios($comentario,$id_producto,$id_usuario);
        if($consulta){
            $salida = 1;
        }
        return $salida; 
    }
}