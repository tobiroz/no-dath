<?php
// Obtener el nombre de usuario de la sesión
session_start();
$nombre = $_SESSION['nombre_usuario'];

// Verificar si se ha enviado una imagen
if (isset($_FILES['foto_perfil'])) {
  // Obtener información de la imagen
  $nombreArchivo = $_FILES['foto_perfil']['name'];
  $rutaTemporal = $_FILES['foto_perfil']['tmp_name'];
  // Mover la imagen a una ubicación permanente (ajusta la ruta según tu configuración)
  $rutaDestino = "../iconos/$nombreArchivo";
  move_uploaded_file($rutaTemporal, $rutaDestino);

  // Realizar la conexión a la base de datos (ajusta los valores según tu configuración)
  $conexion = mysqli_connect('localhost', 'root', '', 'no-dath');

  // Actualizar el campo "foto_perfil" en la tabla "Usuarios"
  $updateQuery = "UPDATE Usuarios SET foto_perfil = '$rutaDestino' WHERE nombre_usuario = '$nombre'";
  mysqli_query($conexion, $updateQuery);

  // Cerrar la conexión a la base de datos
  mysqli_close($conexion);
}

// Redirigir a la página de "Mi Cuenta"
header('Location: cuenta.php');
?>
