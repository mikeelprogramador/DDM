<?php
include_once('../../class/class_sessiones.php');
include_once('../../class/class_login.php');
include_once('../../class/class_user.php');
include_once('../../class/class_funciones.php');
Session::iniciarSessiones();

if( isset($_GET['log']) && $_GET['log'] == 1){
    $email = Funciones::vacunaXxs($_POST['email']);
    $password = Funciones::vacunaXxs($_POST['clave']);
    $login = Login::inicio($email,$password);
    $id = Login::encontrarUsuario(2,$email);

    if( $login == 1){
        $_SESSION['id'] = $id;
        Usuarios::actualizarEstadoUser(1, $id);
        header("location: ../user/ddm.php?");
    }
    if( $login == 2 ){
        $_SESSION['id'] = $id;
        Usuarios::actualizarEstadoUser(1, $id);
        header("location: ../adm/admin.php?");
    }
    if( $login == 0 )header("location: ../../login.php?men=error".$login."");
    if(  $login == -1 )header("location: ../../login.php?men=error".$login."");
}

if( isset($_GET['log']) && $_GET['log'] == 0){

    $email = Funciones::vacunaXxs($_POST['email']);
    $password = Funciones::vacunaXxs($_POST['clave']);
    $nombre = Funciones::vacunaXxs($_POST['nom']);
    $apellido = Funciones::vacunaXxs( $_POST['apellido']);
    $registro = Login::registrar($nombre,$apellido,$email,$password);
    $id = Login::encontrarUsuario(2,$email);

    if( $registro == 1 ){
        $_SESSION['id'] = $id;
        Usuarios::actualizarEstadoUser(1, $id);
        header("location: ../user/ddm.php?");
    }
    if( $registro == 0)header("location: ../../check-in.php?men=".$registro."error");
    if( $registro == -1 )header("location: ../../check-in.php?men=".$registro."error");
}
