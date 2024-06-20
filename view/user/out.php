<?php
    if( ! isset($_SESSION)) session_start();
    include_once("../../metodos/clas-login.php");
    Login::actualizarEstadoUser(2, $_SESSION['id']);
    session_destroy();
    setcookie(session_name(), "", time() - 3600, "/");
    header("location: ../../index.php");