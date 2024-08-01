<link rel="stylesheet" href="../../css/card.css">
  <?php
  $productos = Vista::mostrarProductos(1);
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
?>
