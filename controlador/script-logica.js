document.addEventListener("DOMContentLoaded", function () {
    const postButton = document.getElementById("post-button");
    const postText = document.getElementById("post-text");
    const newsFeed = document.getElementById("news-feed");

    postButton.addEventListener("click", function () {
        const postContent = postText.value;

        if (postContent.trim() !== "") {
            // Enviar la publicación al servidor usando AJAX
            $.ajax({
                url: "./controlador/guardar_publicacion.php",
                type: "POST",
                data: { content: postContent },
                success: function (data) {
                    if (data === "success") {
                        // Limpiar el campo de texto después de la publicación exitosa
                        postText.value = "";
                        // Recargar las publicaciones
                        loadPosts();
                    }
                }
            });
        }
    });

    function loadPosts() {
        // Obtener publicaciones existentes del servidor usando AJAX
        $.ajax({
            url: "./controlador/cargar_publicaciones.php",
            type: "GET",
            success: function (data) {
                // Insertar las publicaciones en el newsFeed
                newsFeed.innerHTML = data;
            }
        });
    }

    // Cargar las publicaciones cuando la página se cargue
    loadPosts();
});
