document.addEventListener("DOMContentLoaded", () => {
    const contenedorReinas = document.getElementById("tarjetasReinas");
    const izqReinas = document.getElementById("botonLeftReinas");
    const derReinas = document.getElementById("botonRightReinas");


    // Inicialización
    if (contenedorReinas.scrollLeft == 0) izqReinas.style.display = "none";
    if (contenedorReinas.scrollWidth <= contenedorReinas.clientWidth) derReinas.style.display = "none";

    // Eventos botones 
    izqReinas.addEventListener("click", () => {
        izquierda(contenedorReinas, izqReinas, derReinas);
    });

    derReinas.addEventListener("click", () => {
        derecha(contenedorReinas, izqReinas, derReinas);
    });
});