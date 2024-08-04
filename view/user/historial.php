<link rel="stylesheet" href="../../css/historial_u.css">
<div class="btn-container">
    <a href="ddm.php?seccion=perfil"><button>Regresar</button></a>
    <button onclick="vaciarHistorial()">Vaciar historial</button>
</div>
<br><br>
<p id="texto-historial"></p>
<div class="historial" id="historial-contenedor">
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




