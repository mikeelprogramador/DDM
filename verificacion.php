<?php
include_once("metodos/clas-login.php");
$ban = $_GET['log'];
$email = $_POST['email'];
$password = $_POST['clave'];
if($ban == 1){
    $veri = ( Login::inicio($email,$password) == 0 ) ? "El usuario o la contraseña son incorrectas" :"";
    echo $veri;
}
if($ban == 0){
    $nombre = $_POST['nom'];
    $apellido = $_POST['apellido'];
    $veri = ( Login::registrar($nombre,$apellido,$email,$password) == 0 ) ? "El usuario ya esta creado" : "";
    echo $veri;
}