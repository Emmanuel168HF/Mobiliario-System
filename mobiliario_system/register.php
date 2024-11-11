<?php
// Configuración de la base de datos
$servername = "localhost"; // Cambia esto si tu servidor MySQL está en otro host
$username = "root"; // Tu nombre de usuario de MySQL
$password = ""; // Tu contraseña de MySQL
$dbname = "mi_base_de_datos"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recoger datos del formulario
$user = $_POST['username'];
$pass = $_POST['password'];
$confirm_pass = $_POST['confirm_password'];

// Validar datos
if (empty($user) || empty($pass) || empty($confirm_pass)) {
    die("Todos los campos son obligatorios.");
}

// Validar longitud del nombre de usuario
if (strlen($user) < 3 || strlen($user) > 50) {
    die("El nombre de usuario debe tener entre 3 y 50 caracteres.");
}

// Validar que el nombre de usuario y la contraseña contengan solo caracteres alfanuméricos
if (!preg_match('/^[A-Za-z0-9]+$/', $user)) {
    die("El nombre de usuario debe contener solo letras y números.");
}

if (!preg_match('/^[A-Za-z0-9]+$/', $pass)) {
    die("La contraseña debe contener solo letras y números.");
}

// Validar longitud de la contraseña
if (strlen($pass) < 8 || strlen($pass) > 50) {
    die("La contraseña debe tener entre 8 y 50 caracteres.");
}

// Validar coincidencia de contraseñas
if ($pass !== $confirm_pass) {
    die("Las contraseñas no coinciden.");
}

// Hash de la contraseña
$hashed_password = password_hash($pass, PASSWORD_BCRYPT);

// Preparar y ejecutar la consulta SQL
$stmt = $conn->prepare("INSERT INTO usuarios (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $user, $hashed_password);

if ($stmt->execute()) {
    echo "Registro exitoso. <a href='index.html'>Iniciar sesión</a>";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>