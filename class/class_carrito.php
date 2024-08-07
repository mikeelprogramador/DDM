<?php 
class Carrito{

    public static function crearCarrito($id_user){
        include_once("../../conf/model.php");
        $consulta = Model::sqlCarrito(1,$id_user);
    }

    public static function verificarCarrito($id_user){
        include_once("../../conf/model.php");
        $salida = 0;
        $consulta = Model::sqlCarrito(2,$id_user);
        while($fila = $consulta->fetch_array()){
            $salida += $fila[0];
        }
        return $salida;
    }

    public static function agregarAlCarrito($carrito,$id_pro,$cantidad){
        include_once("../../conf/model.php");
        $salida = 0;
        $consulta = Model::sqlAgregarCarrito($carrito,$id_pro,$cantidad);
        if($consulta){
            $salida = 1;
        }
        return $salida;
    }

    public static function buscarCarrito($id_user){
        include_once("../../conf/model.php");
        $salida = 0;
        $consulta = Model::sqlBuscarCarrito($id_user);  
        while($fila = $consulta->fetch_array()){
            $salida = $fila[0];
        }
        return $salida;
    }

    public static function dinero($des,$id_user){
        include_once("../../conf/model.php");
        include_once("class_funciones.php");
        $salida = 0;
        $consulta = Model::sqlMostrarCarrito($des,$id_user);
        while($fila = $consulta->fetch_array()){
            $valor = Funciones::intDinero($fila[7]);
            $salida += $valor*floatval($fila[14]);
        }
        return $salida;
    }

    public static function aumentarCantidad($des,$carrito,$id_pro){
        include_once("../../conf/model.php");
        $salida = 0;
        $consulta = Model::sqlAumentarCantidad($des,$carrito,$id_pro);
        if($consulta){
            $salida = 1;
        }
        return $salida;
    }

    public static function restriccionCarrito($id_user,$id_pro){
        include_once("../../conf/model.php");
        $salida = 0;
        $consulta = Model::sqlRestriccionCarrito($id_user,$id_pro);
        while($fila = $consulta->fetch_array()){
            if($fila[0] >0){
                //si salida es 1 es porque este producto ya esta en el carrito
                $salida = 1;
            }   
        }
        return $salida;
    }


}