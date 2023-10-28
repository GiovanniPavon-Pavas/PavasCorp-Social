<?php
include("../almacen/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["content"])) {
    $content = $_POST["content"];
    $usuario_id = 1; 

    // Inserta la publicación en la base de datos
    $sql = "INSERT INTO publicaciones (usuario_id, contenido, fecha, likes, dislikes) VALUES (?, ?, NOW(), 0, 0)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ss", $usuario_id, $content);

    if ($stmt->execute()) {
        echo "correcto";
    } else {
        echo "error";
    }

    $stmt->close();
} else {
    echo "error";
}
