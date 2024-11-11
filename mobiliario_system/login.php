<?php
// Configuración de la base de datos
$servername = "localhost"; // Cambia esto si tu servidor MySQL está en otro host
$db_username = "root"; // Tu nombre de usuario de MySQL
$db_password = ""; // Tu contraseña de MySQL
$dbname = "mi_base_de_datos"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recoger datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Validar datos
if (empty($username) || empty($password)) {
    die("Todos los campos son obligatorios.");
}

// Preparar y ejecutar la consulta SQL para buscar el usuario
$stmt = $conn->prepare("SELECT password FROM usuarios WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 0) {
    // Usuario no encontrado, redirigir al inicio de sesión
    header("Location: index.php?error=1");
    exit();
}

$stmt->bind_result($hashed_password);
$stmt->fetch();

// Verificar la contraseña
if (password_verify($password, $hashed_password)) {
    // Contraseña correcta, redirigir a la página de bienvenida o al área protegida
    header("Location: welcome.html");
} else {
    // Contraseña incorrecta, redirigir al inicio de sesión
    header("Location: index.php?error=1");
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>
