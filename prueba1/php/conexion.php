<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "no-dath";

$conexion = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$conexion)
{
	die("No hay conexion:" .mysqli_connect_error());
}
?>