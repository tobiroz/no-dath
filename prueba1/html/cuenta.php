<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi Blog</title>
  <link rel="icon" href="/img/logo no-dath.png">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <?php
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

  // Cerrar la conexión a la base de datos
  mysqli_close($conexion);
  ?>
  <header>
    <h1><embed src="/img/name png blanco.png" width="170cm"></h1>
    <nav>
      <ul>
        <li><a href="/html/inicio.html">Inicio</a></li>
        <li><a href="/html/foro.html">Foro</a></li>
        <li><a href="/html/acerca.html">Acerca de</a></li>
        <li><a href="/html/contacto.html">Contacto</a></li>
        <li><a href="/html/cuenta.php">cuenta</a></li>
        <li><a href="/php/logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section>
      <h2>Nombre de Usuario</h2>
      <a href=""><?php echo $nombre['nombre_usuario']; ?></a>
    </section>

    <section>
      <h2>Correo Electronico</h2>
      <a href="#"><?php echo $nombre['correo_electronico']; ?></a>
    </section>

    <section>
      <h2>Foto de perfil</h2>
      <a href="#"><img src="<?php echo $nombre['foto_perfil']; ?>" width="50" height="50"></a>
      <h2>Cambiar Foto de Perfil:</h2>
      <form action="cambio_foto_perfil.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="foto_perfil" accept="image/*">
        <button type="submit">Guardar</button>
    </section>
  </main>

  <footer>
    <p>&copy; 2023 No-Dath. Todos los derechos reservados ©.</p>
  </footer>
</body>
</html>