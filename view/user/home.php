<link rel="stylesheet" href="../../css/card.css">
<br>
  <?php
  $productos = Vista::mostrarProductos(1);
  if($productos == 0){
    ?>
      <p id="mensajeProducto"></p>
    <?php
  }else{
    ?><br>
    <!-- <div class="productos"> -->
      <!-- <p class="texto"> -->
      <br>
      <div class="subContainer" id="homeProductos">
          <?php
            echo $productos;
          ?>
        </div>
      <!-- </p>  -->
    <!-- </div>--><?php
  }
?>
