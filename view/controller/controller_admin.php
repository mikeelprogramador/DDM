<?php 
include_once("../../class/class_vista.php");
include_once("../../class/class_crearProducto.php");
include_once("../../class/class_funciones.php");
include_once("../../class/class_user.php");
include_once("../../conf/model.php");
include_once("../../class/class_sessiones.php");
//Se inician las sessiones
Session::iniciarSessiones();
if(Session::verificarSesssiones() == 0 )header("location: ../../index.php");

//Vista administrador de los productos
if(isset($_GET['search'])){
    echo Vista::buscarProducto($_GET['search'],2);
}
//Vista general de los productos
if(isset($_GET['busquedaGeneral'])){
    echo Vista::mostrarProductos($_GET['busquedaGeneral'],2);
}
//Desicion para eliminar un producto
if( isset($_GET['id']) ){
    if(CrearProducto::eliminarProducto($_GET['id']) == 1){
      echo Vista::buscarProducto('',1);
    }
}
//Formulario para cargar productos
if(isset($_POST ['enviar'])){
  
  $id = $_POST['id-pro'];
  $nombre = $_POST['name-pro'];
  $descrip = $_POST['descrip-pro'];
  $caracter = $_POST['caracter-pro'];
  $color = $_POST['color-pro'];
  $cantidad = $_POST['cantidad-pro'];
  $ofertas = $_POST['oferta-pro'];
  $precio = $_POST['precio-pro'];
  (isset($_POST['iva-pro'])? $iva = $_POST['iva-pro']: $iva = 0);
  ($precio > 0?$precio = Funciones::strDinero($precio):$precio = 0 );

  /*Crea una array para las categorias*/
  $categorias = [];
  for($i = 1; $i <=CrearProducto::contarCategorias(2); $i ++){
    if(isset($_POST['categoria'.$i])  != ''){
      $categorias[] = $_POST['categoria'.$i];
    }
  }
 
  //Precio con el iba
  $precio = Funciones::iva($iva,Funciones::intDinero($precio));

  if(isset($_FILES['card-img'])){
    $img  = CrearProducto::img(1,$_FILES['card-img']);//creado la imagen
    //filtro para la imagen
    if( $img == "1" || $img == "0")header("location: ../adm/admin.php?menPro=img".$img."&seccion=seccion-ag-pro");
  }


  if( $img !="1" && $img != "0" && $id != "" && $nombre != ""){
    //Filtro para el produco
    if( $img != "0" && $id != "" && $nombre != ""  ){
    //Crear el producto
      $nowProducto = CrearProducto::cargarProducto($id,$nombre,$descrip,$caracter,$cantidad,$ofertas,$img,$precio,$color);
      if( $nowProducto == 1 ){
        if( !empty($categorias) )CrearProducto::agregarCategoria(1,$categorias,$id);//Se le agregan la categorias al porducto ya creado
        header("location: ../adm/admin.php?menPro=".$nowProducto."&seccion=seccion-ag-pro");//datos si el prodcucto se creo correctamente
      }
      if( $nowProducto == 0 )header("location: ../adm/admin.php?menPro=".$nowProducto."&seccion=seccion-ag-pro");//dato si ya existe
      if( $nowProducto == 2 )header("location: ../adm/admin.php?menPro=".$nowProducto."&seccion=seccion-ag-pro");//dato si no se creo
    }else {
      header("location: ../adm/admin.php?menPro=2&seccion=seccion-ag-pro");
    }
  }

}


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

if(isset($_GET['createCategoria']) && $_GET['createCategoria'] == true){
  if(CrearProducto::countCategorias($_GET['categoria']) == 0){
    Model::sqlCreateCategoria($_GET['categoria']);
    echo 1;
  }else{
    echo 0;
  }
  
}

if(isset($_GET['aparece']) && $_GET['aparece'] == true){
  echo Vista::mostrarCategorias(2);
}

if(isset($_GET['producto']) && ($_GET['producto'])== "actualizar"){
  echo "hola amigos ahhhhh ";
}