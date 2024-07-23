<?php
include_once("class/class_sessiones.php");
Session::iniciarSessiones();
if(Session::verificarSesssiones() == 0 )$_SESSION['id'] = "invitado";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar de cuenta - DDM</title>
</head>
<body>
    <?php
    if(isset($_GET['datause'])){
    ?>
        <form action="view/controller/controller_login.php?cambioPasswprd&datause=<?php echo $_GET['datause']?>" method="post">
        <label for="">Contraseña actual</label>
        <input type="password" name="passwordActual" id="passwordActual" placeholder="Ingresa la contraseña actual">
        <label for="">Nueva contraseña</label>
        <input type="password" name="passwordNueva" id="passwordnuevo" placeholder="Ingresa la nueva contraseña">
        <label for="">Escribe nuevamente la contraseña</label>
        <input type="password" id="repetPassword" placeholder="Ingresa la nueva contraseña">
        <input type="submit">
        </form>
    <?php
        }
    ?>
        <?php
    if(isset($_GET['recuperarContraseña'])){
    ?>
    <div class="save-passwrd">
        <p>A continuacion enviaremos  un correo para recuperar su contraseñe</p>
        <p id="dato"></p>
        <form action="../controller/controller_user.php?saveDato" method="post" onsubmit="enviarCorreo(event,2)">
        <label for="">Correo</label>
        <input type="text" id="correo" name="correo" placeholder="email@gmail.com" required> 
        <input type="submit">
        </form>
        <a href="login.php">Regresar</a>
    </div>
    <?php
        }
    ?>
    


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
<script src="js/user.js"></script>
</html>