<?php

class CrearProducto{
    public static function cargarProducto($id,$nombre,$descrip,$caracter,$cantidad,$oferta,$img,$precio,$color){
        include_once("../../conf/model.php");
        if(CrearProducto::verificarProducto($id,2) == 1 || CrearProducto::verificarProducto($id,3) == 1 ){
            $salida = 0;
        }else{
             $consulta = Model::sqlCargarProducto($id,$nombre,$descrip,$caracter,$cantidad,$oferta,$img,$precio,$color);
             if($consulta){
                 $salida = 1;
             }else{
                 $salida = 2;
             }
         }
        return $salida;
     }
 
     /**
      * Metodo si el producto existe
      */
     public static function verificarProducto($id,$des){
        include_once("../../conf/model.php");
         $consulta = Model::sqlverificarProducto($id,$des);
         while($fila=$consulta->fetch_array()){
             $salida = $fila[0];
         }
         return $salida;
     }
     /**
      * Cargar la imagen
      */
     public static function img($des,$img){
         $salida = "";
         $file = $img;
         $tamaño = $file["size"];
         $nombre = $file["name"];
         $tipo = pathinfo($nombre, PATHINFO_EXTENSION); 
         $ruta_provicional = $file["tmp_name"];
         if($des ==1)$carpeta = "../../fotos/"; 
         if($des ==2)$carpeta = "../../img_user/"; 
            
         if($tipo != 'jpg' && $tipo != 'png' && $tipo != 'gif'&& $tipo != 'tiff' && $tipo != 'webp' && $tipo != 'bmp'&& $tipo != 'jpeg' && $tipo != 'jfif'){
             $salida = "0";
         }else if($tamaño > 1*1280*720){
             $salida = "1";
         }else{
             $src = $carpeta.$nombre;
             move_uploaded_file($ruta_provicional,$src);
             if($des ==1)$carpeta = $salida .= "../../fotos/".$nombre;
             if($des ==2)$carpeta = $salida .= "../../img_user/".$nombre;
             
         }
         return $salida;
     }


     public static function agregarCategoria($des,$categoria,$id_pro){
        include_once("../../conf/model.php");
        $consulta = Model::sqlAgregarCategoria($des,$categoria,$id_pro);
    }

    public static function contarCategorias($des){
        include_once("../../conf/model.php");
        $salida = 0;
        $consulta = Model::sqlAgregarCategoria($des);
        while($fila = $consulta->fetch_array()){
            $salida += $fila[0];
        }
        return $salida;
    }

    public static function countCategorias($categoria){
        include_once("../../conf/model.php");
        $consulta = Model::sqlCountCategorias($categoria);
        while($fila = $consulta->fetch_array()){
            $salida = $fila[0];
        }
    return $salida;
    }
}