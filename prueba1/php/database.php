<?php

include("conexion.php");

$nombre = $_POST["nombre_usuario"];
$correo   = $_POST["correo_electronico"];
$contraseña = $_POST["contraseña"];
$fotoP = $_POST["foto_perfil"];
$verificado = $_POST["verificado"];

//Login
if(isset($_POST["btningresar"]))
{
	$query = mysqli_query($conn,"SELECT * FROM usuarios WHERE nombre_usuario = '$nombre' AND contraseña='$contraseña'");
	$nr = mysqli_num_rows($query);

	if($nr==1)
	{
		echo "<script> window.location='/html/inicio.html' </script>";
	}else
	{
		echo "<script> window.location='/NoExisteUsuario/NEU.html' </script>";
	}
}

//Registrar
if(isset($_POST["btnregistrar"]))
{
	$sqlgrabar = "INSERT INTO usuarios (nombre_usuario, correo_electronico, contraseña) VALUES ('$nombre', '$correo', '$contraseña')";

	if(mysqli_query($conn,$sqlgrabar))
	{
		echo "<script> window.location='/RegistroExitoso/RE.html' </script>";
	}else
	{
		echo "Error: ".$sqlgrabar."<br>".mysql_error($conn);
	}
}

//foro Enviar
//if(isset($_POST["foro"]))
//{
//	$sqlgrabar2 = "INSERT INTO foro(usuario,categoria,msg) values ('$nombre','$cat','$msg')";
//
//	if(mysqli_query($conn,$sqlgrabar2))
//	{
//		echo "<script> window.location='/html/inicio.html' </script>";
//	}else
//	{
//		echo "Error: ".$sqlgrabar."<br>".mysql_error($conn);
//	}
//}

//foro Enviado



?>