<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="recursos/styles_door.css">
    <script src="funciones.js"></script>
</head>
<body>
    <div class="background-image">
        <div class="register-container">
            <h2>Registro de usuario</h2>
            <form action="register.php" method="post" onsubmit="return validateForm()">
                <!-- Nombre(s) -->
                <div class="input-group">
                    <label for="nombre">Nombre(s):</label>
                    <input type="text" id="nombre" name="nombre" required minlength="3" maxlength="50" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" title="Ingresa solo letras y espacios." autocomplete="off">
                </div>

                <!-- Apellidos -->
                <div class="input-group">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" id="apellidos" name="apellidos" required minlength="3" maxlength="50" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" title="Ingresa solo letras y espacios." autocomplete="off">
                </div>

                <!-- Edad -->
                <div class="input-group">
                    <label for="edad">Edad:</label>
                    <input type="number" id="edad" name="edad" required min="1" max="100" title="Ingresa una edad válida entre 1 y 100." autocomplete="off">
                </div>

                <!-- Teléfono -->
                <div class="input-group">
                    <label for="telefono">Número de Teléfono:</label>
                    <input type="tel" id="telefono" name="telefono" required pattern="[0-9]{10}" title="Ingresa un número de teléfono válido de 10 dígitos." autocomplete="off">
                    <button type="button" onclick="enviarCodigo()">Enviar Código de Verificación</button>
                </div>

                <!-- Código de Verificación -->
                <div class="input-group" id="codigo-verificacion" style="display: none;">
                    <label for="codigo">Código de Verificación:</label>
                    <input type="text" id="codigo" name="codigo" required minlength="6" maxlength="6" pattern="[0-9]{6}" title="Ingresa el código de 6 dígitos recibido." autocomplete="off">
                </div>

                <!-- Contraseña -->
                <div class="input-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required minlength="8" maxlength="50" pattern="[A-Za-z0-9]+" title="La contraseña debe tener entre 8 y 50 caracteres y contener solo letras y números." autocomplete="off">
                </div>

                <!-- Confirmar Contraseña -->
                <div class="input-group">
                    <label for="confirm-password">Confirmar Contraseña:</label>
                    <input type="password" id="confirm-password" name="confirm_password" required minlength="8" maxlength="50" pattern="[A-Za-z0-9]+" title="La contraseña debe tener entre 8 y 50 caracteres y contener solo letras y números." autocomplete="off">
                </div>

                <button type="submit" id="registerButton" disabled>Registrar</button>
            </form>
        </div>
    </div>
</body>
</html>
