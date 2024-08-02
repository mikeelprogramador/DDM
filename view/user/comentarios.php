
 <link rel="stylesheet" href="../../css/comentarios.css"> 
 <button><a href="ddm.php?seccion=perfil">Regresar</a></button> <br><br>
<?php
    $comentarios =  Comentarios::verComentariosUsuario(1,$_SESSION['id']);
    $respuestas =  Comentarios::verComentariosUsuario(2,$_SESSION['id']);
    if($comentarios === 0){
        if($respuestas === 0){
            ?><p>No has Realizado ningun comentario</p><?php
        }else{
            echo $respuestas;
        }
    }else{
        ?>
            <div class="comentarios-contaner">
                <?php echo $comentarios; ?>
            </div>
        <?php
    }
?>


