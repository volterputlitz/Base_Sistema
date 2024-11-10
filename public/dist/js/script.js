$(document).ready(function() {
    $(".menu-link").on("click", function(e) {
        e.preventDefault();
        
        // Obtiene el valor de la página a cargar desde el atributo `data-page`
        let page = $(this).data("page");

        // Llama a `content.php` usando AJAX y actualiza el contenido de `#content`
        $.ajax({
            url: "app/content.php",
            type: "POST",
            data: { page: page },
            success: function(response) {
                $("#content").html(response);
            },
            error: function() {
                $("#content").html("<p>Error al cargar el contenido.</p>");
            }
        });
    });
});