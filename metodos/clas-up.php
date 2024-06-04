<?php
class cargarProducto {

    public static function upProducto($id,$nombre,$descrip,$caracter,$color,$cantidad,$oferta,$img){
        $salida = "";
       include("../metodos/bd-conect/inclucion-bd.php");
       $conexion = mysqli_connect($url,$user,$clave,$bd);
       $verifica = cargarProducto::verificar($id);
       if($verifica == 1){
           $salida .= "El codigo de este producto ya se encuntra creado";
       }if($verifica ==0){
            $sql = "INSERT INTO tb_productos(id_producto,producto_nombre,descripcion_producto,caracteristicas_producto,id_p_c,cantidades,id_ofertas,img)";
            $sql.= "VALUE('$id','$nombre','$descrip','$caracter','$color','$cantidad','$oferta','$img')";
            $consulta = $conexion->query($sql);
            if($consulta){
                $salida .= "El producto se ha cardo exitosamente";
            }else{
                $salida .= "Hubo un error al subir el archivo";
            }
       }
       $conexion->close();
       return $salida;
    }

    public static function verificar($id){
        $salida = 0;
        include("../metodos/bd-conect/inclucion-bd.php");
        $conexion = mysqli_connect($url,$user,$clave,$bd);
        $sql = "select * from tb_productos where id_producto =$id";
        $consulta = $conexion->query($sql);
        if($conexion->affected_rows >0){
            $salida += 1;
        }else{
            $salida +=0;
        }
        $conexion->close();
        return $salida;
    }
}