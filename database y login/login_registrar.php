<?php

include("conexion.php");

$nombre = $_POST["usuario"];
$pass   = $_POST["pass"];

//Login
if(isset($_POST["btningresar"]))
{
	$query = mysqli_query($conn,"SELECT * FROM login WHERE usuario = '$nombre' AND pass='$pass'");
	$nr = mysqli_num_rows($query);

	if($nr==1)
	{
		echo "<script> window.location='/pagina web/HTML/inicio.html' </script>";
	}else
	{
		echo "<script> window.location='/database y login/No Existe Usuario/NEU.html' </script>";
	}
}

//Registrar
if(isset($_POST["btnregistrar"]))
{
	$sqlgrabar = "INSERT INTO login(usuario,pass) values ('$nombre','$pass')";

	if(mysqli_query($conn,$sqlgrabar))
	{
		echo "<script> window.location='/database y login/Registro Exitoso/RE.html' </script>";
	}else
	{
		echo "Error: ".$sqlgrabar."<br>".mysql_error($conn);
	}
}


?>
