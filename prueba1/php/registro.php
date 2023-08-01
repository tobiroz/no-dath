<?php
    if(isset($_POST["btnregistrar"]))
    {
        // Obtener los datos del formulario
        $nombre = $_POST['nombre_usuario'];
        $correo = $_POST['correo_electronico'];
        $contraseña = $_POST['contraseña'];

        // Realizar la conexión a la base de datos (ajusta los valores según tu configuración)
        $conexion = mysqli_connect('localhost', 'root', '', 'no-dath');

        // Consulta para verificar si el nombre de usuario ya existe
        $query = "SELECT * FROM usuarios WHERE nombre_usuario = '$nombre'";
        $resultado = mysqli_query($conexion, $query);

        // Verificar si ya existe un usuario con el nombre de usuario proporcionado
        if (mysqli_num_rows($resultado) == 0) {
        // Insertar el nuevo usuario en la base de datos
        $insertQuery = "INSERT INTO usuarios (nombre_usuario, correo_electronico, contraseña) VALUES ('$nombre', '$correo', '$contraseña')";
        mysqli_query($conexion, $insertQuery);

        // Iniciar sesión
        session_start();

        // Guardar el nombre de usuario en la variable de sesión
        $_SESSION['nombre_usuario'] = $nombre;

        // Redirigir a la página de "Mi Cuenta"
        header('Location: ../html/cuenta.php');
        } else {
        // Mostrar mensaje de error
        echo "El nombre de usuario ya está en uso. Por favor, elige otro.";
        }
    }
    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
?>
