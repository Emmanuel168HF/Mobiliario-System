// Validar formulario
function validateForm() {
  const password = document.getElementById("password").value;
  const confirmPassword = document.getElementById("confirm-password").value;
  const codigo = document.getElementById("codigo").value;

  if (password !== confirmPassword) {
      alert("Las contraseñas no coinciden.");
      return false;
  }

  if (codigo.length !== 6) {
      alert("El código de verificación debe ser de 6 dígitos.");
      return false;
  }

  return true;
}

// Enviar código de verificación por SMS
window.enviarCodigo = function() {
  const telefono = document.getElementById('telefono').value;

  if (!telefono || telefono.length !== 10) {
      alert("Por favor, ingresa un número de teléfono válido de 10 dígitos.");
      return;
  }

  fetch('enviarCodigoSMS.php', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: new URLSearchParams({ telefono: telefono })
  })
  .then(response => response.text())
  .then(data => {
      alert(data);
      document.getElementById("codigo-verificacion").style.display = "block";
      document.getElementById("registerButton").disabled = false;
  })
  .catch(error => console.error('Error:', error));
};