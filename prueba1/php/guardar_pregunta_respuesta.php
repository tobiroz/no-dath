<?php
// Aquí puedes agregar tu lógica para guardar los datos en una base de datos o en algún otro lugar
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "no-dath";

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si hay errores de conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Obtener los datos enviados por la solicitud AJAX
$question = $_POST['question'];
$answer = $_POST['answer'];

// Preparar la consulta SQL para insertar los datos en la base de datos
$sql = "INSERT INTO pregunta_respuesta (question, answer) VALUES ('$question', '$answer')";

// Ejecutar la consulta y verificar si se ha insertado correctamente
if ($conn->query($sql) === TRUE) {
    echo "La pregunta y respuesta se han guardado correctamente en la base de datos.";
} else {
    echo "Error al guardar la pregunta y respuesta en la base de datos: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();


// En este ejemplo, simplemente imprimimos los datos guardados en el servidor
echo "Pregunta: " . $question . "<br>";
echo "Respuesta: " . $answer;
?>
