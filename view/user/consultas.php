<?php
session_start();
include_once("../../cajon/bootstrap/bootstrap.php");
include_once("../../metodos/clas-user.php");
include_once("../../metodos/clas-view.php");
if(isset($_GET['comentario'])){

    $comentario = $_POST['comentario'];
    if($_POST['comentario'] != ""){
        $id = id::desencriptar($_GET['data']);
        if( Productos::CrearComentarios($comentario,$id,$_SESSION['id']) == 1){
            //header("location: ddm.php?seccion=producto&data=".$_GET['data']."");
            echo Vista::viewComentarios($id);
        }
    }else{
        //header("location: ddm.php?seccion=producto&data=".$_GET['data']."");
    }
}


