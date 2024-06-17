<?php
include_once("../../cajon/bootstrap/bootstrap.php");
include_once("../../metodos/clas-view.php");
$id = id::desencriptar($_GET['data']);
echo Vista::ContenidoProducto($id);

?>
<a href="ddm.php"><button>Regresar</button></a>

<br><br>
<form action="consultas.php?data=<?php echo $_GET['data'];  ?>&name=en" method="post">
<textarea name="comentario" id="" onclick="aparece()"></textarea>
<input type="submit">
</form>

<hr>
<div class="comentarios">
    <label for="">Cajas de comentarios</label>

</div>