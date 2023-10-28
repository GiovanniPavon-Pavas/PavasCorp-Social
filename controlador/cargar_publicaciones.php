<?php
include("../almacen/conexion.php");

// Consulta para obtener las publicaciones ordenadas por fecha (puedes ajustar la consulta según tus necesidades)
$sql = "SELECT p.*, u.nombre AS nombre_usuario
        FROM publicaciones p
        INNER JOIN usuarios u ON p.usuario_id = u.id
        ORDER BY p.fecha DESC";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        // Mostrar la publicación
        echo '<div class="publicacion">';
        echo '<p class="nombre-usuario">' . $fila["nombre_usuario"] . '</p>';
        echo '<p class="fecha-publicacion">' . $fila["fecha"] . '</p>';
        echo '<p class="contenido-publicacion">' . $fila["contenido"] . '</p>';
        echo '<p class="likes">Likes: ' . $fila["likes"] . '</p>';
        echo '<p class="dislikes">Dislikes: ' . $fila["dislikes"] . '</p>';
        // Puedes agregar más elementos HTML y estilos CSS aquí para mejorar el diseño
        echo '</div>';
    }
} else {
    echo "No hay publicaciones disponibles.";
}

$conexion->close();
?>
