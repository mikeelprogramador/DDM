<div class="historial">
    <?php
        $historial = Historial::verHistorial($_SESSION['id']);
        if($historial == 0){
            ?><div class="col-12">
                <p>No tienes productos en el carrito.</p>
            </div><?php 
        }else{
            echo $historial
            ?><a href="admin.php?seccion=perfil">Regresar</a><?php
        }
    ?>
</div>

