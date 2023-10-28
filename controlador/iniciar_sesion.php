<?php
include("../almacen/conexion.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"]) && isset($_POST["contrasena"])) {
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];

    $sql = "SELECT id, contrasena FROM usuarios WHERE email = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {
        // Usuario encontrado, verifica la contraseña
        $fila = $resultado->fetch_assoc();
        $hash_contrasena = $fila["contrasena"];

        if (password_verify($contrasena, $hash_contrasena)) {
            // Contraseña válida, guarda el ID en una variable de sesión
            $_SESSION["usuario_id"] = $fila["id"];
            header("Location: ../index.php"); // Redirige al usuario a la página de inicio
        } else {
            echo "Credenciales inválidas, por favor intenta de nuevo.";
        }
    } else {
        echo "Credenciales inválidas, por favor intenta de nuevo.";
    }
} else {
    echo "Petición no válida.";
}

$conexion->close();
?>
