<link rel="stylesheet" href="../../css/style-nav-right.css">

<center>
<div class="cajon_user">
    <?php
        echo Vista::verUsuarios();
    ?>
</div>
</center>
<button onclick="recargar()">Recargar Estado Del Usuario</button>
<button> <a href="admin.php?seccion=admin_home">volver</a> </button>
    
</body>
</html>


