<!doctype html>
<html lang="en">
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
    <title>Registro</title>
    <link rel="stylesheet" href="css/stylo3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    
    <form action="verificacion.php?log=0" method="post">
        <input type="text" name="nom" placeholder="Ingrese tu nombre" required>
        <input type="text" name="apellido" placeholder="apellido" required>
        <input type="text" name="email" placeholder="correo" required>
        <input type="password" name="clave" placeholder="contraeña" required>
        <input type="submit" name="enviar" value="Finalizar Registro">
        <a href="login.php"><input class="inicio" type="button" value="iniciar sesión"></a>
    </form>
   


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>