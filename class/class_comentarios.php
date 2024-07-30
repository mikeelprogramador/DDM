<?php

class Comentarios {

    public static function contarRespuestas($idComentario){
        include_once("../../conf/model_vista.php");
        $consulta = ModelVista::sqlContarRespuestas($idComentario);
        while($fila = $consulta->fetch_array()){
            $salida = $fila[0];
        }
        return $salida;
    }
     /**
     * Metodo para visuarliza los comentarios
     */
    public static function verComentarios($id_pro,$id_user){
        include_once("../../conf/model.php");
        include_once("class_fechas.php");
        include_once("class_encript.php");
        $salida = "";
        $consulta = Model::sqlViewComentarios($id_pro);
        while($fila = $consulta->fetch_array()){
            $respuestas = self::contarRespuestas($fila[5]);
            //comentarios
            $salida .= "<div class='avatar-container'>";
            $salida .= "<div class='avatar'>";
            $salida .= "<img src='".$fila[1]."'>";
            $salida .= "</div>";
            $salida .= "<div class='usuario-container'>";
            $salida .= "<div class='nombre-tiempo-container'>"; 
            $salida .= "<p class='nombre'>@".$fila[0]."</p>";
            $salida .= "<p class='tiempo'>".Fecha::mostrarFechas($fila[3])." </p>";
            if($fila[6] != null){
                $salida .= "<p class='tiempo'>(Editado ".Fecha::mostrarFechas($fila[6]).")</p>";
            }
            $salida .= "</div>"; 
            $salida .= "<div class='actualizarComentario' id='actualizarComentario".$fila[5]."'>";//actualizar comentario
            $salida .= "<p id='texto".$fila[5]."'></p>";
            $salida .= "<input type='text' class='comentario' id='nuevoComentario".$fila[5]."'></input>";
            $salida .= "<button onclick=\"actualizarComentario('nuevoComentario".$fila[5]."','texto".$fila[5]."','".id::encriptar($id_pro)."','".$fila[5]."')\">Enviar</button>";
            $salida .= "<button onclick=\"editarComentario(2,'actualizarComentario".$fila[5]."','comentario".$fila[5]."')\">Cancelar</button><br>";
            $salida .= "</div>"; //cierre actualizar comentario 
            $salida .= "<p class='comentario' id='comentario".$fila[5]."'>". $fila[2]."</p><br>";
            $salida .= "<div class='button-container'>"; 
            if ($fila[4] == $id_user) {
                $salida .= "<button onclick=\"editarComentario(1,'actualizarComentario".$fila[5]."','comentario".$fila[5]."','nuevoComentario".$fila[5]."')\">Editar</button>";
                $salida .= "<button onclick='eliminarComentario(\"$fila[5]\",\"$id_pro\")'>Eliminar</button>";
            }
            $salida .= "<button onclick=\"responder('respuesta-container".$fila[5]."')\">Responder</button>";
            $salida .= "</div>";//cierre de la button-container
            if( $respuestas >0)$salida .= "<a onclick=\"responder('RespuestasComentario".$fila[5]."')\">Respuestas ".$respuestas."</a>";
            $salida .= "</div>";
            $salida .= "</div>";
            $salida .= "<div class='RespuestasComentario' id='RespuestasComentario".$fila[5]."'>";//contenedor respuestas
            $salida .= self::verRespuestas($fila[5],$id_user);
            $salida .= "<button onclick=\"cancelarRespuesta('RespuestasComentario".$fila[5]."')\">Ocultar Respuestas</button><br><br>";
            $salida .= "</div>";//cierre del contendor de respuetas
            $salida .= "<div id='respuesta-container".$fila[5]."' class='respuesta-container'>";//respuesta-container
            $salida .= "<p id='textRespuesta".$fila[5]."'></p>";
            $salida .= "<p class='nombre'>Responder a @".$fila[0]."</p>";
            $salida .= "<input type='text' id='respuesta".$fila[5]."' placeholder='Escribe tu respuesta...'>";
            $salida .= "<button type='submit' onclick=\"cargarRespuesta('".$fila[5]."','respuesta".$fila[5]."')\">Enviar</button>";
            $salida .= "<button onclick=\"cancelarRespuesta('respuesta-container".$fila[5]."')\">cancelar</button>";
            $salida .= "</div>";//cierre de la respuesta-container
        }
        return $salida;
    }

    public static function verRespuestas($idComentario,$id_user){
        include_once("../../conf/model_vista.php");
        include_once("class_fechas.php");
        $salida = "";
        $consulta = ModelVista::sqlVerRespuestas($idComentario);
        while($fila = $consulta->fetch_array()){
            //comentarios
            $salida .= "Respuestas al cometario de @".$fila[0]." ";
            $salida .= "<div class='avatar-container'>";
            $salida .= "<div class='avatar'>";
            $salida .= "<img src='".$fila[1]."'>";
            $salida .= "</div>";
            $salida .= "<div class='usuario-container'>";
            $salida .= "<div class='nombre-tiempo-container'>"; 
            $salida .= "<p class='nombre'>@".$fila[0]."</p>";
            $salida .= "<p class='tiempo'>".Fecha::mostrarFechas($fila[3])."</p>";
            $salida .= "</div>"; 
            $salida .= "<p class='comentario'>". $fila[2]."</p><br>";
            $salida .= "<div class='button-container'>"; 
            if ($fila[4] == $id_user) {
                $salida .= "<button>Editar</button>";
                $salida .= "<button onclick='eliminarComentario(\"$fila[5]\")'>Eliminar</button>";
            }
            $salida .= "</div>";//cierre de la button-container
            $salida .= "</div>";
            $salida .= "</div>";
        }
        return $salida;
    }

}