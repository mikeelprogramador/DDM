<?php

class ModelVista{

    public static function sqlVerHistorial($id_user){
        include("model/conexion.php");
        $sql = "select * from tb_historial as t1 ";
        $sql .= "inner join tb_productos as t2 on t1.id_producto = t2.id_producto ";
        $sql .= "where id_usuario = '$id_user' order by fec_ver desc";
        return $conexion->query($sql);
    }

    public static function sqlContarRespuestas($idComentario){
        include("model/conexion.php");
        $sql = "select count(*) from tb_respuestasComentarios ";
        $sql .= "where idComentario = '$idComentario' ";
        return $conexion->query($sql);
    }

    public static function sqlVerRespuestas($idComentario){
        include("model/conexion.php");
        $sql = "select t3.nombre,t3.foto_usuarios,repuesta,fech_repuesta,t3.id,idRespuesta,idComentario ";
        $sql .= "from tb_respuestasComentarios as t1 ";
        $sql .= "inner join tb_comentarios as t2 on t1.idComentario = t2.id_comentario ";
        $sql .= "inner join tb_usuarios as t3 on t2.id_usuario = t3.id  ";
        $sql .= "where id_comentario = '$idComentario' order by fech_repuesta desc ";
        return $conexion->query($sql);
    }

    
}