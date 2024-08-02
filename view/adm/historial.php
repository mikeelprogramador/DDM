<a href="admin.php?seccion=perfil">Regresar</a>
<div class="historial">
    <?php
        $historial = Historial::verHistorial($_SESSION['id']);
        if($historial == 0){
            ?><div class="col-12">
                <p>Ve productos para ampliar tu historial</p>
            </div><?php 
        }else{
            ?><button>Vaciar historial</button> <?php
            echo $historial;
        }
    ?>
</div>


