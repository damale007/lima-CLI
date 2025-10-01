document.addEventListener("DOMContentLoaded", () => {
    // Código
    const contenedorVideo = document.getElementById("tarjetasVideo");
    const izqVideo = document.getElementById("botonLeftVideo");
    const derVideo = document.getElementById("botonRightVideo");

    // Inicialización
    if (contenedorVideo.scrollLeft == 0) izqVideo.style.display = "none";
    if (contenedorVideo.scrollWidth <= contenedorVideo.clientWidth) derVideo.style.display = "none";

    // Eventos botones 
    izqVideo.addEventListener("click", () => {
        izquierda(contenedorVideo, izqVideo, derVideo);
    });

    derVideo.addEventListener("click", () => {
        derecha(contenedorVideo, izqVideo, derVideo);
    });
});