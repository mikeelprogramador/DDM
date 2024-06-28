<?php
include_once("../../metodos/clas-producto.php");
include_once("../../metodos/clas-view.php");
include_once("../../cajon/bootstrap/bootstrap.php");
include_once("../../metodos/clas-carrito.php");
if(!isset($_SESSION))session_start();

if( isset($_POST['agregarComentario']) && $_POST['agregarComentario'] == true ){
    $comentario = $_POST['comentario'];
    if( $comentario != ""){
        $id = id::desencriptar($_POST['data']);
        if( Producto::crearComentarios($comentario,$id,$_SESSION['id']) == 1){
            echo Vista::viewComentarios($id,$_SESSION['id']);
        }
    }
}
if( isset($_POST['eliminarComentario']) && $_POST['eliminarComentario'] == true ){
    $id_comen = $_POST['comen'];
    $id = $_POST['data'];  
    if(  Producto::eliminarComentarios($id_comen,$_SESSION['id']) == 1){
       echo Vista::viewComentarios($id, $_SESSION['id']);

    }    
}
if( isset($_GET['data'])){
    $id = id::desencriptar($_GET['data']);
    $carrito = Carrito::buscarCarrito($_SESSION['id']);
   if( $carrito != 0 ){
        if(Carrito::agregarAlCarrito($carrito,$id) == 1 ){
            header("location: product.php?http=".$_GET['http']."&data=".$_GET['data']."&question=true");
        }
   }else{
    header("location: product.php?http=".$_GET['http']."&data=".$_GET['data']."&question");
   }
}