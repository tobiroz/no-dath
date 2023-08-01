<?php
if(isset($_POST["btningresar"])) {
  // Obtener los datos del formulario
  $nombre = $_POST['nombre_usuario'];
  $contraseña = $_POST['contraseña'];

  // Realizar la conexión a la base de datos (ajusta los valores según tu configuración)
  $conexion = mysqli_connect('localhost', 'root', '', 'no-dath');

  // Consulta para verificar las credenciales del usuario
  $query = "SELECT * FROM usuarios WHERE nombre_usuario = '$nombre' AND contraseña = '$contraseña'";
  $resultado = mysqli_query($conexion, $query);

  // Verificar si se encontró un usuario con las credenciales proporcionadas
  if (mysqli_num_rows($resultado) == 1) {
    // Iniciar sesión
    session_start();

    // Guardar el nombre de usuario en la variable de sesión
    $_SESSION['nombre_usuario'] = $nombre;
    $_SESSION['contraseña'] = $contraseña;

    // Redirigir a la página de "Mi Cuenta"
    header('Location: ../html/cuenta.php');
  } else {
    // Mostrar mensaje de error
    echo "Credenciales inválidas. Por favor, intenta nuevamente.";
  }

  // Cerrar la conexión a la base de datos
  mysqli_close($conexion);
}
?>