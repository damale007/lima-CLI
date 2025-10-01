document.addEventListener("DOMContentLoaded", () => {
    const f = document.getElementById("file");

    f.addEventListener('change', function(e) {
        if (e.target.files[0]) {
            var nombre = document.getElementById("nombreImagen");

            nombre.value="";
          }
    });
});