<?php
// Iniciar la sesión
session_start();

// Destruir todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redirigir a la página de inicio o a otra página de tu elección
header('Location: /html/sin-loguear/inicio2.html');
exit();
?>
