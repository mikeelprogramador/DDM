<?php
include_once("../../class/class_sessiones.php");
include_once("../../class/class_user.php");
include_once("../../class/class_vista.php");
include_once("../../class/class_estadisticas.php");
include_once("../../class/class_funciones.php");
include_once("../../class/class_encript.php");
include_once("../../class/class_producto.php");

Session::iniciarSessiones();
if(Session::verificarSesssiones() == 0 )header("location: ../../index.php");
if(Usuarios::verificarPerfil(1,$_SESSION['id']) == "2")header("location: ../user/ddm.php?");

$seccion = "admin_home"; //Sección por defecto.
if( isset( $_GET[ 'seccion' ] ) )$seccion = $_GET[ 'seccion' ]; 

if($seccion == "out"){
  Session::destruirSessiones();
}else{
  include( "nav-adm.php" );
}

if( isset($_GET['menPro']) )echo Funciones::alertas($_GET['menPro'],1);