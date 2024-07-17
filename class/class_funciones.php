<?php  
include_once("class_sessiones.php");
Session::iniciarSessiones();

class Funciones{

    public static function intDinero($dinero){
        $salida = str_replace(",","",$dinero);
        $salida = str_replace(".","",$salida);
        $salida = substr($salida,0,-2);
        $salida = intval($salida);
        return $salida;
    }
    public static function strDinero($dinero){
        $salida = number_format($dinero, 2, ',', '.');
        return $salida;
    }

    public static function iva($iva,$precio){
        $salida =floatval($iva)/100;
        $salida *= $precio ;
        $salida += $precio;
        return self::strDinero($salida);
    }


    public static function alertas($mensaje,$alerta){
        if($alerta == 1)$function = "alertPro";
        if($alerta == 2)$function = "verificacion";
        if($alerta == 3)$function = "alertCarrito";
        $salida = "<script>";
        $salida .= "window.onload = function() {";
        $salida .= $function."('".$mensaje."');";
        $salida .= "};";
        $salida .= "</script>";
        return $salida;
    }

    public static function activarRecapchat(){
        $salida = "<script>";
        $salida .="window.onload = function() {";
        $salida .= "document.getElementById('password').disabled = true;";
        $salida .= "document.getElementById('botonEnviar').style.display = 'none';";
        $salida .= "Recaptcha().then((salida) => {";
        $salida .= "if(salida === true){";
        $salida .= "document.getElementById('password').disabled = false;";
        $salida .= "document.getElementById('botonEnviar').style.display = 'block';";
        $salida .= "window.location.href = 'login.php?reset=';";
        $salida .= "} });";
        $salida .= "};";
        $salida .= "</script>";
        return $salida;
    }

    public static function horas($hora,$lugar){
        $salida = "<script>";
        $salida .= "window.onload = function() {";
        $salida .= "mostrarFechas('".$hora."','".$lugar."');";
        $salida .= "};";
        $salida .= "</script>";
        return $salida;
    }

    public static function vacunaXxs($texto){
        $patron_xss = '/<\s*(script|img|iframe|frame|video|audio|embed|object|svg|javascript)\b[^>]*>.*?<\/\s*\1\s*>/i';
        //remplaza el script 
        $salida = preg_replace($patron_xss, '', $texto);
        //elimina el html
        $salida = strip_tags($salida);
        return $salida;
    }

}