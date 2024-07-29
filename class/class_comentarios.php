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
        include_once("class_funciones.php");
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
            $salida .= "<p class='tiempo'>".Fecha::mostrarFechas($fila[3])."</p>";
            $salida .= "</div>"; 
            $salida .= "<p class='comentario'>". $fila[2]."</p><br>";
            $salida .= "<div class='button-container'>"; 
            if ($fila[4] == $id_user) {
                $salida .= "<button>Editar</button>";
                $salida .= "<button onclick='eliminarComentario(\"$fila[5]\",\"$id_pro\")'>Eliminar</button>";
            }
            $salida .= "<button onclick=\"responder('respuesta-container".$fila[5]."')\">Responder</button>";
            $salida .= "</div>";//cierre de la button-container
            if( $respuestas >0)$salida .= "<a onclick=\"responder('RespuestasComentario".$fila[5]."')\">Respuestas ".$respuestas."</a>";
            $salida .= "</div>";
            $salida .= "<div class='RespuestasComentario' id='RespuestasComentario".$fila[5]."'>hola</div>";//Contendor de respuetas
            $salida .= "</div>";
            $salida .= "<div id='respuesta-container".$fila[5]."' class='respuesta-container'>";
            $salida .= "<p class='nombre'>Responder a @".$fila[0]."</p>";
            $salida .= "<input type='text' id='respuesta' placeholder='Escribe tu respuesta...'>";
            $salida .= "<button type='submit' onclick='cargarRespuesta(\"$fila[5]\")'>Enviar</button>";
            $salida .= "<button onclick=\"cancelarRespuesta('respuesta-container".$fila[5]."')\">cancelar</button>";
            $salida .= "</div>";//cierre de la respuesta-container
        }
        return $salida;
    }

}