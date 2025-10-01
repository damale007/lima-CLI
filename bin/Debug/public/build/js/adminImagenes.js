document.addEventListener("DOMContentLoaded", () => {
    const url = document.getElementById("url");

    url.addEventListener("focusout", () => {
        const contenido = url.value.replace("watch?v=", "embed/");
        var arrayURL = contenido.split("/");
        const thumb = "http://img.youtube.com/vi/" + arrayURL[arrayURL.length-1] + "/default.jpg";

        url.value = contenido;
        document.getElementById("urlimagen").value = thumb; 

        // https://www.youtube.com/watch?v=PdPlDcudv4g
        // https://www.youtube.com/embed/tV3emQlGy6k
        // http://img.youtube.com/vi/tV3emQlGy6k/default.jpg
    });
});