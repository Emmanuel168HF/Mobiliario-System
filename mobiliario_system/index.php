<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="recursos/styles_door.css">
</head>
<body>
    <div class="background-image">
        <div class="register-container">
            <h2>Iniciar Sesión</h2>
            <form action="login.php" method="post">
                <div class="input-group">
                    <label for="username">Nombre de usuario:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Iniciar sesión</button>
            </form>
            <div class="login-link">
                <button onclick="redirectToRegister()">Registrar Nuevo Usuario</button>
            </div>
            <?php
                if (isset($_GET['error']) && $_GET['error'] == '1') {
                    echo '<p class="error-message">Nombre de usuario o contraseña incorrectos. Por favor, intenta de nuevo.</p>';
                }
            ?>
        </div>
    </div>

    <script>
        function redirectToRegister() {
            window.location.href = 'registro.php'; // Cambia esto a la URL del formulario de registro
        }
    </script>
</body>
</html>
