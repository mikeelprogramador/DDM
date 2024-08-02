<?php
    $megustas = Vista::verMegustasUsuario($_SESSION['id']);
    if($megustas === 0){
        ?>
            <p>No tienes productos que te gusten todavia</p>
        <?php
    }else{
        ?>
            <p>Productos que más te gustaron</p>
            <div class="megustascontainer">
                <?php echo $megustas; ?>
            </div>
        <?php
    }
?>
<a href="admin.php?seccion=perfil">Regresar</a>