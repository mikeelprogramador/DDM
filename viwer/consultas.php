<?php
include_once("../metodos/clas-up.php");


if(isset($_GET['id_pro']) and isset($_GET['caracter_pro']) and isset($_GET['color']) and isset($_GET['oferta_pro']) and isset($_GET['name_pro']) and isset($_GET['descrip_pro']) and isset($_GET['img_pro']) and isset($_GET['cantidad'])) {
    $id = $_GET['id_pro'];
    $caracter = $_GET['caracter_pro'];
    $color = $_GET['color'];
    $oferta = $_GET['oferta_pro'];
    $nombre = $_GET['name_pro'];
    $descrip = $_GET['descrip_pro'];
    $cantidad = $_GET['cantidad'];
    $img = $_GET['img_pro'];
    echo( cargarProducto::upProducto($id,$nombre,$descrip,$caracter,$color,$cantidad,$oferta,$img));
} else {
    echo "Tienes que llenar todos los parametros";
}

