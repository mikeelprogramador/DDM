<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style-nav-right.css">
    <link rel="stylesheet" href="../../css/custom.css"> <!-- Nuevo archivo CSS para estilos adicionales -->
    <title>Usuarios</title>
</head>
<body>
    <div class="content">
        <center>
            <div class="cajon_user">
                <?php
                    echo Vista::verUsuarios();
                ?>
            </div>
        </center>
        <div class="button-container">
            <button onclick="recargar()">Recargar Estado Del Usuario</button>
            <button> <a href="admin.php?seccion=admin_home">Volver</a> </button>
        </div>
    </div>
   
    <script src="../../js/your-script.js"></script>
</body>
</html>
  

