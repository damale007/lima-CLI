document.addEventListener("DOMContentLoaded", () => {
    const ventana = document.getElementById("emoji");
    const ventanaImagen = document.getElementById("Cimagen");
    const botonEmoji = document.getElementById("botonEmoji");
    const botonImagen = document.getElementById("botonImagen");
    const cerrarEmoji = document.getElementById("cerrarEmoji");
    const cerrarImagen = document.getElementById("cerrarImagen");

    const emoji = document.querySelectorAll(".emojiPart");

    ventana.style.display = "none";
    ventanaImagen.style.display = "none";


    emoji.forEach ((icono) => {
        icono.addEventListener("click", () => {
            insert(icono.innerHTML);
        });
    });

    botonEmoji.addEventListener("click", () => {
        ventana.style.display = "block";
    });

    botonImagen.addEventListener("click", () => {
        ventanaImagen.style.display = "block";
    });

    cerrarEmoji.addEventListener("click", () => {
        ventana.style.display = "none";
    });

    cerrarImagen.addEventListener("click", () => {
        ventanaImagen.style.display = "none";
    });

    document.getElementById('miFormulario').addEventListener('submit', function(e) {
        e.preventDefault(); // Evita que el formulario se envíe normalmente

        const imagenes = document.getElementById("imagenes");
        const formData = new FormData();
        const archivo = document.getElementById('uploadBtn').files[0];
        formData.append('imagen', archivo);

        fetch('/imagenesNuevoMensaje', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(resultado => {
            const respuesta = JSON.parse(resultado);

            //Se añade la miniatura
            const thumbnail = document.getElementById("thumbnail");
            const li = document.createElement("li");
            li.innerHTML = "<img src='" + respuesta.url + "' class='imagenMiniatura'>";
            thumbnail.appendChild(li);

            // Se modifica el input con la imagen
            imagenes.value += "[IMG]https://www.callecabo.com/" + respuesta.url + "[/IMG]";

            //Se cierra la ventana de añadir imagen
            document.getElementById("Cimagen").style.display = "none";
            document.getElementById("capaThumbnail").style.display = "block";
        })
        .catch(error => {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Error al subir la imagen"
            });
        });
    });



	function insert(textoAInsertar) {
        const textarea = document.getElementById("textoMensaje");

        textarea.value += textoAInsertar;
    }
});