<?php
include_once("metodos/clas-login.php");
$ban = $_GET['log'];
$email = $_POST['email'];
$password = $_POST['clave'];
if($ban == 1){
    $veri = ( Login::inicio($email,$password) == 1 ) ? header("location: view/user/ddm.php") : "El usuario o la contraseña son incorrectas";
    echo $veri;
}
if($ban == 0){
    $nombre = $_POST['nom'];
    $apellido = $_POST['apellido'];
    $veri = ( Login::registrar($nombre,$apellido,$email,$password) == 1 ) ? include("js/login.js") : "El usuario ya esta creado";
    echo $veri;
}