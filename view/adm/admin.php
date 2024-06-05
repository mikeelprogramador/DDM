<?php

  $seccion = "seccion1"; //Sección por defecto.

  if( isset( $_GET[ 'seccion' ] ) ){
    $seccion = $_GET[ 'seccion' ];
  }

  //echo $seccion;

  include( "nav-adm.php" );
  include_once("../../metodos/clas-up.php");

if(isset($_POST['enviar'])){
  
  $id = $_POST['id-pro'];
  $nombre = $_POST['name-pro'];
  $descrip = $_POST['descrip-pro'];
  $caracter = $_POST['caracter-pro'];
  $color = $_POST['color-pro'];
  $cantidad = $_POST['cantidad-pro'];
  $ofertas = $_POST['oferta-pro'];
  $precio = $_POST['precio-pro']; 
  $img = '';
  if(isset($_FILES["card-img"])){
    $file = $_FILES["card-img"];
    $nombre = $file["name"];
    $tipo = pathinfo($nombre, PATHINFO_EXTENSION); 
    $ruta_provicional = $file["tmp_name"];
    $carpeta = "../../fotos/";    
    if($tipo != 'jpg' && $tipo != 'png' && $tipo != 'JPG'){
      echo "Error, el archivo tiene que ser jpg o png";
    }
    else{
      $src = $carpeta.$nombre;
      move_uploaded_file($ruta_provicional,$src);
      $img = "../fotos/".$nombre;
    }
  }
  
  echo( cargarProducto::upProducto($id,$nombre,$descrip,$caracter,$color,$cantidad,$ofertas,$img,$precio));
}