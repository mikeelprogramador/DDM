<?php
include_once("../../cajon/bootstrap/bootstrap.php");
include_once("../../metodos/clas-view.php");
$id = id::desencriptar($_GET['data']);
echo Vista::ContenidoProducto($id);

?>
<a href="ddm.php"><button>Regresar</button></a>

<br><br>
<form>
<input type="text" name="comentario" id="comentario"  >
<input type="submit" onclick="apareceCometario(<?php echo $_GET['data'];  ?>)">
</form>

<hr>
<div class="comentarios">
    <label for="">Cajas de comentarios</label>
    <br><br>
    <div class="coment">
        <?php
            include_once("../../metodos/clas-view.php");
            echo Vista::viewComentarios($id);
        ?>
    </div>
</div>