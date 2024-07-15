<?php
include_once("../../class/class_vista.php");
include_once("../../class/class_carrito.php");
include_once("../../class/class_encript.php");
include_once("../../class/class_sessiones.php");
Session::iniciarSessiones();
if(Session::verificarSesssiones() == 0 )header("location: ../../index.php");
if( Carrito::verificarCarrito($_SESSION['id']) == 0 )Carrito::crearCarrito($_SESSION['id']);

$seccion = "home"; 
  
if( isset( $_GET[ 'seccion' ] )) $seccion = $_GET[ 'seccion' ];

if($seccion == "categorias"){
  if(isset($_GET['cate']))$categorias = $_GET['cate'];
}

if($seccion == "out"){
  Session::destruirSessiones();
}else{
  include( "navbar-user.php" );
}