<?php
// Establecer la conexión con la base de datos
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'no-dath';

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si el usuario ha iniciado sesión
session_start();
if (!isset($_SESSION['nombre_usuario'])) {
  // Si no ha iniciado sesión, redirigir a la página de inicio de sesión
  header('Location: ../php/login.html');
  exit();
}

// Obtener el nombre de usuario de la sesión
$nombre = $_SESSION['nombre_usuario'];

// Realizar la conexión a la base de datos (ajusta los valores según tu configuración)
$conexion = mysqli_connect('localhost', 'root', '', 'no-dath');

// Consulta para obtener los datos del usuario actual
$query = "SELECT * FROM Usuarios WHERE nombre_usuario = '$nombre'";
$resultado = mysqli_query($conexion, $query);

// Obtener los datos del usuario
$nombre = mysqli_fetch_assoc($resultado);


// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}
// Obtener el contenido del post enviado por el formulario
$question = $_POST['pregunta'];
$answer = $_POST['respuesta'];

// Insertar el post en la base de datos
$sql = "INSERT INTO pregunta_respuesta (pregunta, respuesta) VALUES ('$question','$answer')";

if ($conn->query($sql) === TRUE) {
    echo "El post se ha guardado correctamente.";
} else {
    echo "Error al guardar el post: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>