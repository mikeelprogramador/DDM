<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/style-nav-usuario.css">
</head>
<body>


<br>
  <div class="productos">
    <p class="texto">
    <br>
<div class="subContainer">
    <?php
      include_once("../../metodos/clas-view.php");
      echo Vista::mostrarProductos();
    ?>
</div>
  </p> 
  </div>



  
</body>
</html>
