<?php 
class Carrito{

    public static function crearCarrito($id_user){
        include_once("modelo.php");
        $consulta = Model::sqlCarrito(1,$id_user);
    }

    public static function verificarCarrito($id_user){
        include_once("modelo.php");
        $salida = 0;
        $consulta = Model::sqlCarrito(2,$id_user);
        while($fila = $consulta->fetch_array()){
            $salida += $fila[0];
        }
        return $salida;
    }

    public static function agregarAlCarrito($id_user){
        include_once("modelo.php");
        $salida = 0;
        
    }

}