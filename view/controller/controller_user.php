<?php
include_once("../../class/class_encript.php");
include_once("../../class/class_crearProducto.php");
include_once("../../class/class_vista.php");
include_once("../../class/class_user.php");
include_once("../../class/class_funciones.php");
include_once("../../class/class_carrito.php");
include_once("../../conf/model.php");
include_once("../../class/class_sessiones.php");
include_once("../../class/class_token.php");
include_once("../../class/class_correo.php");
include_once("../../class/class_login.php");
Session::iniciarSessiones();
if(Session::verificarSesssiones() == 0 ){
    header("location: ../../index.php");
    exit();
}
Session::sessionCodigo();

if(isset($_FILES['foto_perfil'])){
    $files =  $_FILES['foto_perfil'] ;
    $img = CrearProducto::img(2,$files);
    if($img =="1" || $img =="0"){
        echo "limitesImg";
    }else{
        Usuarios::cargarImagen($img,$_SESSION['id']);
        echo $img;
    }
}
if(isset($_GET['aumentar']) && $_GET['aumentar'] == true){
    $id = id::desencriptar($_GET['data']);
    $carrito = Carrito::buscarCarrito($_SESSION['id']);
    if($_GET['cantidad'] < $_GET['max']){
        echo(Carrito::aumentarCantidad(1,$carrito,$id) == 1?  Carrito::mostrarCarrito(1,$_SESSION['id']): '');
    }
}

if(isset($_GET['restar']) && $_GET['restar'] == true){
    $id = id::desencriptar($_GET['data']);
    $carrito = Carrito::buscarCarrito($_SESSION['id']);
    if($_GET['cantidad'] > 1){
        echo(Carrito::aumentarCantidad(2,$carrito,$id) == 1? Carrito::mostrarCarrito(1,$_SESSION['id']): '');
    }
}

if(isset($_GET['dinero']) && $_GET['dinero']== 'actualizar'){
    echo Funciones::strDinero(Carrito::dinero(1,$_SESSION['id']));
}

if(isset($_GET['eliminarDelCarrito']) && $_GET['eliminarDelCarrito'] == true){
    $carrito = Carrito::buscarCarrito($_SESSION['id']);
    $id = id::desencriptar($_GET['data']);
    Model::sqlEliminarDelCarrito($carrito,$id);
    echo Carrito::mostrarCarrito(1, $_SESSION['id']);
}

if(isset($_GET['saveDato'])){
    $_SESSION['codigo'] = token::Obtener_token(10);
    if(Login::buscarUsuariosCorreoId($_POST['correo'],$_SESSION['id']) == 0){
        echo "not exist";
    }else{
        echo Correo::enviarCorreo(2,$_POST['correo'], $_SESSION['codigo']);
    }
}

if(isset($_GET['cambiarFoto'])){
    $img = '../../img/logo-icon-person.jpg';
    Usuarios::cargarImagen($img,$_SESSION['id']);
    echo $img;
}

if(isset($_GET['busquedaGeneral'])){
    echo Vista::mostrarProductos(2,$_GET['busquedaGeneral']);
}