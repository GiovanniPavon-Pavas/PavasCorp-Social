<?php
session_start();
if (isset($_SESSION["usuario_id"])) {
    // El usuario ha iniciado sesión, obtenemos su nombre desde la base de datos
    include("almacen/conexion.php");

    $usuario_id = $_SESSION["usuario_id"];
    $sql = "SELECT nombre FROM usuarios WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {
        $fila = $resultado->fetch_assoc();
        $nombre_usuario = $fila["nombre"];
    } else {
        echo "Error";
    }

    $conexion->close();
} else {
    echo "Inicia sesión para ver esta página.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="recursos/estilo.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="controlador/script-logica.js" defer></script>
    <title>Pavas Corp - Social</title>
</head>
<body>
    <header>
        <div class="user-info">
            <img src="user.jpg" alt="User Image">
            <h2><?php echo $nombre_usuario ?> </h2>
        </div>
    </header>
    <main>
        <div class="post-form">
            <textarea id="post-text" placeholder="¿Qué estás pensando?"></textarea>
            <button id="post-button">Publicar</button>
        </div>
        <div id="news-feed" class="news-feed">
            <!-- Las publicaciones se cargarán aquí usando AJAX -->
        </div>
    </main>
</body>
</html>
