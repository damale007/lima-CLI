document.addEventListener("DOMContentLoaded", () => {
    // Código para tarjetas del video
    const contenedorVideo = document.getElementById("tarjetas");
    const izqVideo = document.getElementById("botonLeft");
    const derVideo = document.getElementById("botonRight");

    // Tarjetas de los Cultos
    const contenedorCultos = document.getElementById("tarjetasCultos");
    const izqCultos = document.getElementById("botonLeftCultos");
    const derCultos = document.getElementById("botonRightCultos");

    // Miembros de la Junta
    const contenedorJunta = document.getElementById("tarjetasJunta");
    const izqJunta = document.getElementById("botonLeftJunta");
    const derJunta = document.getElementById("botonRightJunta");

    // Otros
    const contenedorOtros = document.getElementById("tarjetasOtros");
    const izqOtros = document.getElementById("botonLeftOtros");
    const derOtros = document.getElementById("botonRightOtros");

    // Inicialización tarjetas video
    if (contenedorVideo.scrollLeft == 0) izqVideo.style.display = "none";
    if (contenedorVideo.scrollWidth <= contenedorVideo.clientWidth) derVideo.style.display = "none";

    // Inicialización tarjetas Cultos
    if (contenedorCultos.scrollLeft == 0) izqCultos.style.display = "none";
    if (contenedorCultos.scrollWidth <= contenedorCultos.clientWidth) derCultos.style.display = "none";

    // Inicialización miembros Junta
    if (contenedorJunta.scrollLeft == 0) izqJunta.style.display = "none";
    if (contenedorJunta.scrollWidth <= contenedorJunta.clientWidth) derJunta.style.display = "none";

    // Inicialización tarjetas otros
    if (contenedorOtros.scrollLeft == 0) izqOtros.style.display = "none";
    if (contenedorOtros.scrollWidth <= contenedorOtros.clientWidth) derOtros.style.display = "none";

    // Eventos botones Tarjetas video
    izqVideo.addEventListener("click", () => {
        izquierda(contenedorVideo, izqVideo, derVideo);
    });

    derVideo.addEventListener("click", () => {
        derecha(contenedorVideo, izqVideo, derVideo);
    });

    // Eventos botones Tarjetas cultos
    izqCultos.addEventListener("click", () => {
        izquierda(contenedorCultos, izqCultos, derCultos);
    });

    derCultos.addEventListener("click", () => {
        derecha(contenedorCultos, izqCultos, derCultos);
    });

    // Eventos botones miembros de Junta
    izqJunta.addEventListener("click", () => {
        izquierda(contenedorJunta, izqJunta, derJunta);
    });

    derJunta.addEventListener("click", () => {
        derecha(contenedorJunta, izqJunta, derJunta);
    });

    // Eventos botones Tarjetas Otros
    izqOtros.addEventListener("click", () => {
        izquierda(contenedorOtros, izqOtros, derOtros);
    });

    derOtros.addEventListener("click", () => {
        derecha(contenedorOtros, izqOtros, derOtros);
    });
});