<?php

class Encriptar{
    private static function encriptar($password){
        $opciones = [
            'cost'=> 12,
        ];
       $passwordEncript = password_hash($password,PASSWORD_DEFAULT,$opciones);
        return $passwordEncript;
    }

    private static function verificar($password,$passwordEncript){
        return password_verify($password,$passwordEncript);
    }

    public static function codificar($des,$password,$passwordEncript = null){
        if($des == 1)$salida = self::encriptar($password);
        if($des == 2)$salida = self::verificar($password,$passwordEncript);
        return $salida;
    }
}

class id{

    public static function encriptar($dato) {
        return base64_encode($dato);
    }
    
    public static function desencriptar($dato) {
        return base64_decode($dato);
    }

}