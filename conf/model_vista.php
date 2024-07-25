<?php

class ModelVista{

    public static function sqlVerHistorial($id_user){
        include("model/conexion.php");
        $sql = "select * from tb_historial as t1 ";
        $sql .= "inner join tb_productos as t2 on t1.id_producto = t2.id_producto ";
        $sql .= "where id_usuario = '$id_user' order by fec_ver asc";
        return $conexion->query($sql);
    }

    
}