<!doctype html>
<html lang="es">
  <head>

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-05CZXNWMZE"></script>
  <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-05CZXNWMZE');
  </script> 

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo ($seccion == "categorias"?$categorias:$seccion) ?></title>
    <link rel="stylesheet" href="../../css/stylo1.css">
    <link rel="stylesheet" href="../../css/style-carrito.css">
    <link rel="stylesheet" href="../../css/style-nav-usuario.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
  </head>
  <body class="body">

  <nav class="navbar navbar-expand-lg bg-gris-oscuro custom-navbar" id="nav">
  <div class="container-fluid">
    <img src="../../img/logo.png" alt="">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="ddm.php?seccion=home">Inicio</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categorias
          </a>
          <ul class="dropdown-menu custom-dropdown">
            <?php
                echo Vista::mostrarCategorias(1,1);
            ?>
          </ul>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="#">Ofertas</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <div class="avatar me-2">
                  <img src='<?php echo Usuarios::fotoPerfil($_SESSION['id']) ?>' id="foto_avatar">
              </div>
              <?php echo Usuarios::verificarPerfil(2,$_SESSION['id'])?>
          </a>
          <ul class="dropdown-menu custom-dropdown">
              <li><a class="dropdown-item" href="ddm.php?seccion=perfil">Perfil</a></li>
              <li><a class="dropdown-item" href="ddm.php?seccion=out">Cerrar sesión</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Bienvenido <?php echo Usuarios::verificarPerfil(2,$_SESSION['id'])?></a>
        </li>
      </ul>

      
      <div class="d-flex">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
          <a href="ddm.php?seccion=carrito" class="nav-link active" aria-current="page" href="#"><img src="../../img/carro.png" alt=""></a>
          </li>
        </ul>
      </div>
      <?php
        if($seccion == "home" ||  $seccion == "categorias" || $seccion == "historial"   ){
          ?>
          <form class="d-flex" role="search">
            <input class="form-control me-2" id="barra-search" type="search" placeholder="Buscar productos" aria-label="Search" onkeypress="pulsar(event)">
            <button class="btn btn-outline-success " type="button" id="boton"  onclick="buscarProductos(<?php echo $lugar;?><?php echo ',';?>'<?php if($seccion == 'categorias')echo $categorias; ?>')">Buscar</button>
          </form>
          <?php
        }
      ?>
    </div>
  </div>
</nav>


  <div class="container">

  <?php
      include($seccion.".php");
  ?>

  </div>

  <footer class="footer">
    <div class="container_footer text-center">
      <div class="footer-content">
        <p>&copy; <?php echo date("Y"); ?> DDM. Empresa de marketing</p>
        <p>
          <a href="#" class="text-white footer-link">Términos y condiciones</a>
        </p>
      </div>
      <div class="footer-contact">
        <p>Contáctanos:</p>
        <p>
          <p>Correo: michaelhernan211@gmail.com</p> <br>
          <p>Teléfono: +57 3185049904</p> 
        </p>
      </div>
      <div class="footer-contact">
        <p>Contáctanos:</p>
        <p>
          <p>Correo: judacas135@gmail.com</p> <br>
          <p>Teléfono: +57 3219612850</p> 
        </p>
      </div>
    </div>
  </footer>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment-with-locales.min.js" integrity="sha512-4F1cxYdMiAW98oomSLaygEwmCnIP38pb4Kx70yQYqRwLVCs3DbRumfBq82T08g/4LJ/smbFGFpmeFlQgoDccgg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../../js/user.js"></script>
    <script src="../../js/alert.js"></script>
    <script src="../../js/carrito.js"></script>
    <script src="../../js/coment.js"></script>
    <script src="../../js/productos.js"></script>

  </body>
  
</html>