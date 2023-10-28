<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión - PCSocial</title>
</head>
<body>
    <form method="post" action="controlador/iniciar_sesion.php">
        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" required>
        <br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required>
        <br>
        <button type="submit">Iniciar Sesión</button>
    </form>
</body>
</html>
