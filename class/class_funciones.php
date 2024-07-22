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


    public static function alertas($mensaje,$alerta,$id = null){
        include_once("class_producto.php");
        if($alerta == 1)$function = "alertPro";
        if($alerta == 2)$function = "verificacion";
        if($alerta == 3){
            $function = "alertCarrito";
            $hora = Productos::detallesDelProducto(10,$id);
        }
        $salida = "<script> ";
        $salida .= "window.onload = function() { ";
        $salida .= $function."('".$mensaje."'); ";
        if($alerta == 3)$salida .= "mostrarFechas('".$hora."','mostra_fecha');";
        $salida .= "}; ";
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

    public static function htmlRecuperarContraseña($nombre,$id_user,$token){
        $html = '
        <!DOCTYPE html>
        <html lang="es">
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Recuperar clave</title>
          <style>
            body {
              font-family: Arial, sans-serif;
              background-color: #f0f0f0;
              text-align: center;
              padding: 20px;
            }
            .container {
              max-width: 600px;
              margin: 0 auto;
              background-color: #ffffff;
              padding: 20px;
              border-radius: 8px;
              box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            img {
              max-width: 100%;
              height: auto;
              margin-bottom: 20px;
            }
            a {
              color: #007bff;
              text-decoration: none;
            }
            a:hover {
              text-decoration: underline;
            }
          </style>
        </head>
        <body>
        
        <div class="container">
          <img src="https://drive.google.com/file/d/1PY-QgfjBiYczDnqJ5SDY3k69REWB2uJI/view?usp=drive_link" alt="Imagen de recuperar clave">
          <P>Bienvenido '.$nombre.'</P>
            Este es el metodo de recuperacion de tu clave
          <p>Nueva clave: '.$token.' </p>
          <a href="localhost/DDM/recuperacion.php?datause='.$id_user.'">Cambiar clave</a>
        </div>
        
        </body>
        </html>
    ';

    return $html;
    }

}