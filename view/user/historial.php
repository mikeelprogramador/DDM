<link rel="stylesheet" href="../../css/historial_u.css">
<div class="btn-container">
    <button><a href="ddm.php?seccion=perfil">Regresar</a></button>
    <button>Vaciar historial</button>
</div>
<br><br>
<div class="historial">
    <?php
        $historial = Historial::verHistorial($_SESSION['id']);
        if($historial == 0){
            ?><div class="col-12">
                <p>Ve productos para ampliar tu historial</p>
            </div><?php 
        }else{
            echo $historial;
        }
    ?>
</div>




