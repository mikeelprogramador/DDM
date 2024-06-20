<?php
class Adim{

    public static function verUsuarios(){
        include_once("modelo.php");
        $salida = "";
        $consulta = Model::sqlCraerIdUsuario(2);
        while($fila = $consulta->fetch_array()){
            $salida .= "Nombre: ".$fila[1]."<br>";
            $salida .= "Apellido: ".$fila[2]."<br>";
            $salida .= $fila[5]."<br>";
            if( $fila[6] == 0) $salida .= "SuperAdmin"."<br>";
            if( $fila[6] == 1) $salida .= "Admin"."<br>";
            if( $fila[6] == 2) $salida .= "Cliente"."<br>";
            $salida .= $fila[7]."<br><br>";
        }
        return $salida; 
    }

}