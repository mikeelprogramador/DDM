<link rel="stylesheet" href="../../css/styloPerfil.css">

<!-- Barra de navegacion delperfil -->
<div class="con"> 
  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Detalles del perfil</a>
  <ul class="dropdown-menu custom-dropdown">
    <li><a class="dropdown-item" href="#">Historial</a></li>
    <hr>
    <li><a class="dropdown-item" href="#">Productos que me gustaron</a></li>
    <hr>
    <li><a class="dropdown-item" href="ddm.php?seccion=compras">Compras</a></li>
    <hr>
    <li><a class="dropdown-item" href="#">Comentarios</a></li>
    <div id="contenido_sub-contenedor">
    <hr>
    <li><a class="dropdown-item" onclick="regresarPerfil()">Regresar</a></li>
    </div>
  </ul>
</div><br>

<!-- contenedor obsiones de usuario -->
 <div class="sub-contenedor" id="sub-contenedor">
  <!-- contendor 1 -->
  <div>
    Cambiar contraseña
  </div>
  <!-- contenedor 2 -->
    <div>
      Olvide la contraseña
    </div>
  <!-- conteneodor 3 -->
    <div>
      Cambiar Correo
    </div>
  <!-- contenedor 4 -->
   <div>
      Eliminar Cuenta
   </div>

 </div>


<!-- Comentarios -->
<div>
<center>

<div class="perfil" id="perfil">
    <?php
        echo Vista::perfil($_SESSION['id'],1);
    ?>
</div>
</center>
</div>









