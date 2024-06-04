const passwordInput = document.getElementById('password');
const togglePassword = document.getElementById('toggle-password');

togglePassword.addEventListener('click', function () {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);

    // Cambia la imagen según el estado
    this.src = type === 'password' ? 'img/ojo1.png' : 'img/ojo2.png';
    this.alt = type === 'password' ? 'Mostrar contraseña' : 'Ocultar contraseña';
});

function validateForm() {
    var password = document.getElementById("clave").value;
    var confirmPassword = document.getElementById("confirm_clave").value;
    var error = document.getElementById("error");

    if (password !== confirmPassword) {
      error.textContent = "Las contraseñas no coinciden.";
      return false;
    }
    return true;
  }