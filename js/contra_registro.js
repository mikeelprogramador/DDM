// Este es el script donde podemos visualizar la contraseña made by Juan Castañeda  
document.getElementById('toggle-password').addEventListener('click', function () {
    const passwordInput = document.getElementById('clave');
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
  
    // Cambia la imagen del ojo según el estado de la contraseña
    this.src = type === 'password' ? 'img/ojo1.png' : 'img/ojo2.png';
  });
  
  document.getElementById('toggle-confirm-password').addEventListener('click', function () {
    const confirmPasswordInput = document.getElementById('confirm_clave');
    const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    confirmPasswordInput.setAttribute('type', type);
  
    // Cambia la imagen del ojo según el estado de la contraseña
    this.src = type === 'password' ? 'img/ojo1.png' : 'img/ojo2.png';
  });
  
  function validateForm(event) {
    var password = document.getElementById("clave").value;
    var confirmPassword = document.getElementById("confirm_clave").value;
    var error = document.getElementById("error");
    var terminos = document.getElementById('terminos');
    var correo = document.getElementById('email').value;
    var form = event.target;

    if(!terminos.checked){
      event.preventDefault();
      window.location.replace('check-in.php?terminos')
    }else{
      event.preventDefault();
      var param = {
        'email':correo
      }
      $.ajax({
        data:param,
        url: 'view/controller/controller_login.php?autenticacion',
        datatype: 'texto',
        method: 'post',
        success: function(respuesta){
          console.log(respuesta);
          if(respuesta === "1"){
            window.alert(Mensajes.mensajesGlobales(121));
          }else{
            Recaptcha(2,respuesta).then((salida) => {
              if(salida === true){
                form.submit();
              }
            });
          }
        },
        error: function(xhr,status,error){
          console.log(error);
        }
      });
    }

    if (password !== confirmPassword) {
        error.textContent = "Las contraseñas no coinciden.";
        return false;
    }

    return true;
  }