<?php
$conn = new PDO("mysql:host=localhost, dbname=no-dath", "root", "");
$query = "SELECT nombre_usuario, verificado FROM usuarios";
$stmt = $conn->query($query);
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios as $usuario) {
    echo '<p>' . $usuario['nombre_usuario'];

    if ($usuario['verificado']) {
        echo ' <span style="color: green;">&#10004;</span>'; // Símbolo de verificación (marca de cheque verde)
    }

    echo '</p>';
}
?>
