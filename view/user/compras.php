
<link rel="stylesheet" href="../../css/style-compras.css">

<div class="compras">
    <?php
    echo Compras::verCompras($_SESSION['id']);
    ?>
</div>

<a href="ddm.php?seccion=perfil">Regresar</a>