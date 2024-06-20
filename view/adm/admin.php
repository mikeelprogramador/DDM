<?php
  if(! isset($_SESSION)) session_start();
  if(! isset($_SESSION['id'])){
    header("location: ../../index.php");
  }else{
    if($_SESSION['id'] == ""){
      header("location: ../../index.php");
    }
    include_once("../../metodos/clas-admin.php");
    if(Adim::verificarPerfil(1,$_SESSION['id']) == "2"){
      header("location: ../user/ddm.php?");
    }
  }
  $seccion = "seccion1"; //Sección por defecto.

  if( isset( $_GET[ 'seccion' ] ) ){
    $seccion = $_GET[ 'seccion' ];
  }

  //echo $seccion;

  include( "nav-adm.php" );
  include_once("../../metodos/clas-producto.php");
 
