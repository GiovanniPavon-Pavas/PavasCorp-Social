<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos/styles.css">
    <style>
        .mensaje-oculto {
            display: none;
        }
    </style>
</head>
<body>
    <form id="registroForm" action="controlador/registrar.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br>

        <label for="apellido_paterno">Apellido Paterno:</label>
        <input type="text" name="apellido_paterno" id="apellido_paterno" required><br>

        <label for="apellido_materno">Apellido Materno:</label>
        <input type="text" name="apellido_materno" id="apellido_materno" required><br>

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" id="contrasena" required><br>

        <input type="submit" value="Registrarse">
    </form>

    <div id="mensajeRegistro" class="mensaje-oculto">Registro exitoso. Redirigiendo al login.</div>

    <script>
        $(document).ready(function() {
            $("#registroForm").on("submit", function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr("action"),
                    method: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        $("#mensajeRegistro").removeClass("mensaje-oculto");
                        setTimeout(function() {
                            window.location.href = "login.php";
                        }, 2000);
                    },
                    error: function(error) {
                        console.log("Error: " + error);
                    }
                });
            });
        });
    </script>
</body>
</html>
