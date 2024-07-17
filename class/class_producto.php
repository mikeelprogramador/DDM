<?php
class Productos {
        /**
     * Metodo para crear comentario
     */
    public static function crearComentarios($comentario,$id_producto,$id_usuario){
                include_once("../../conf/model.php");
        $salida = 0;
        $consulta = Model::sqlComentarios($comentario,$id_producto,$id_usuario);
        if($consulta){
            $salida = 1;
        }
        return $salida; 
    }
    /**
     * Eliminar comentario
     */
    public static function eliminarComentarios($id_comen, $id_user){
                include_once("../../conf/model.php");
        $salida = 0;
        $consulta = Model::sqlEliminarComentario("","eliminar",$id_comen, $id_user);
        if($consulta){
            $salida = 1;
        }
        return $salida; 
    }

    public static function productos($des,$id_pro){
                include_once("../../conf/model.php");
        $salida = ""; 
        $consulta = Model::sqlProductos($des,$id_pro);
        while($fila = $consulta->fetch_array()){
            $salida .= $fila[0];
        }
        return $salida; 
    }
    


        /**
     * Agregar megusta a un producto
     */
    public static function valoracion($id_pro,$id_user,){
        include_once("../../conf/model.php");
        $consulta = Model::sqlValoracion($id_pro,$id_user);
    }

    public static function actualizarLikes($id_user,$id_pro,$valoracion){
        include_once("../../conf/model.php");
        $salida = 1;
        $consulta = Model::sqlLikes(3,$id_user,$id_pro,$valoracion);
        if($consulta){
            $salida = 0;
        }
        return $salida;
    }

    public static function contarValoracion($valoracion,$id_pro){
        include_once("../../conf/model.php");
        $salida = 0;
        $consulta = Model::sqlContarValoracion($valoracion,$id_pro);
        while($fila = $consulta->fetch_array()){
            $salida += $fila[0];
        }
        return $salida;
    }

    public static function verificarLikes($id_user,$id_pro){
        include_once("../../conf/model.php");
        $salida =1;
        $consulta = Model::sqlLikes(1,$id_user,$id_pro);
        while($fila = $consulta->fetch_array()){
            $salida = $fila[0];
        }
        return $salida; 
    }

    public static function eliminarLikes($id_user,$id_pro){
        include_once("../../conf/model.php");
        $consulta = Model::sqlLikes(2,$id_user,$id_pro);
    }

    public static function valoracionUsuario($id_user,$id_pro){
        include_once("../../conf/model.php");
        $salida =1;
        $consulta = Model::sqlLikes(4,$id_user,$id_pro);
        while($fila = $consulta->fetch_array()){
            $salida = $fila[0];
        }
        return $salida;
    }

    public static function checkUsuario($id_user,$id_pro){
                include_once("../../conf/model.php");
        $salida = -1;
        $consulta = Model::sqlLikes(5,$id_user,$id_pro);
        while($fila = $consulta->fetch_array()){
            $salida = $fila[0];
        }
        return $salida;
    }

    public static function verCantidades($id_pro,$des){
        include_once("../../conf/model.php");
        $salida = 0;
        $consulta = Model::sqlverificarProducto($id_pro,$des);
        while($fila = $consulta ->fetch_assoc()){
            $salida = $fila['cantidades'];
        }
        return $salida;
}


}
