<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../../css/styloPerfil.css">
    <title>Perfil</title>
</head>
<body>


<div class="con"> 
<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Detalles del perfil
          </a>
          <ul class="dropdown-menu custom-dropdown">
            <li><a class="dropdown-item" href="#">Historial</a></li>
            <hr>
            <li><a class="dropdown-item" href="#">Prductos con mayor reseña de me gusta</a></li>
            <hr>
            <li><a class="dropdown-item" href="ddm.php?seccion=compras">Compras</a></li>
            <hr>
            <li><a class="dropdown-item" href="#">Comentarios</a></li>
          </ul>
</div>

<div>
<center>

<div class="perfil">
    <?php
        echo Vista::perfil($_SESSION['id'],1);
    ?>
</div>
</center>
</div>

</body>
</html>









