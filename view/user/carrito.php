<div class="carrito" id="carrito">
<?php
    echo Vista::mostrarCarrito($_SESSION['id']);
?>
</div>
<div class="dinero" id="dinero">
    <?php
        echo number_format(Carrito::dinero($_SESSION['id']), 2, ',', '.');
    ?>
</div>
<button>Comprar</button>