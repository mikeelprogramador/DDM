<?php
session_start();
include_once("../../cajon/bootstrap/bootstrap.php");
include_once("../../metodos/clas-user.php");
if(isset($_GET['name'])){
    
    $comentario = $_POST['comentario'];
    if($_POST['comentario'] != ""){
        $id = id::desencriptar($_GET['data']);
        if( Productos::CrearComentarios($comentario,$id,$_SESSION['id']) == 1){
            header("location: ddm.php?seccion=producto&data=".$_GET['data']."");
        }
    }else{
        echo "puto!!! escribe algo";
        //header("location: ddm.php?seccion=producto&data=".$_GET['data']."");
    }
}


