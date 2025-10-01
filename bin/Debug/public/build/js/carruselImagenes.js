document.addEventListener("DOMContentLoaded", () => {
    // Código
    const contenedorImagenes = document.getElementById("tarjetasImagenes");
    const izqImagenes = document.getElementById("botonLeftImagenes");
    const derImagenes = document.getElementById("botonRightImagenes");

    // Inicialización
    if (contenedorImagenes.scrollLeft == 0) izqImagenes.style.display = "none";
    if (contenedorImagenes.scrollWidth <= contenedorImagenes.clientWidth) derImagenes.style.display = "none";

    // Eventos botones 
    izqImagenes.addEventListener("click", () => {
        izquierda(contenedorImagenes, izqImagenes, derImagenes);
    });

    derImagenes.addEventListener("click", () => {
        derecha(contenedorImagenes, izqImagenes, derImagenes);
    });
});