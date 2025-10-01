document.addEventListener("DOMContentLoaded", () => {
    // Miembros de la Junta
    const contenedorJunta = document.getElementById("tarjetasJunta");
    const izqJunta = document.getElementById("botonLeftJunta");
    const derJunta = document.getElementById("botonRightJunta");

    // Inicialización miembros Junta
    if (contenedorJunta.scrollLeft == 0) izqJunta.style.display = "none";
    if (contenedorJunta.scrollWidth <= contenedorJunta.clientWidth) derJunta.style.display = "none";

    // Eventos botones miembros de Junta
    izqJunta.addEventListener("click", () => {
        izquierda(contenedorJunta, izqJunta, derJunta);
    });

    derJunta.addEventListener("click", () => {
        derecha(contenedorJunta, izqJunta, derJunta);
    });
});