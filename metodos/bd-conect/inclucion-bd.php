<?php
$url = "localhost";
$user = "root";
$clave = "";
$bd = "bd_ddm";

$conexion = mysqli_connect($url,$user,$clave,$bd);

if($conexion->connect_error){
    echo "Error al momento de ingregar al servidor";
}