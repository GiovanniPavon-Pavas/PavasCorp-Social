<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "PavasCorp-Social";

$conexion = new mysqli($servername, $username, $password, $dbname);

if ($conexion->connect_error) {
    die("Conexión a la base de datos fallida: " . $conexion->connect_error);
}
?>
