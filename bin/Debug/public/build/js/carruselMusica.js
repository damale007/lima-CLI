document.addEventListener("DOMContentLoaded", () => {
    const contenedorCoro = document.getElementById("tarjetasCoro");
    const izqCoro = document.getElementById("botonLeftCoro");
    const derCoro = document.getElementById("botonRightCoro");
    const contenedorVarios = document.getElementById("tarjetasVarios");
    const izqVarios = document.getElementById("botonLeftVarios");
    const derVarios = document.getElementById("botonRightVarios");
       const contenedorLista = document.getElementById("tarjetasLista");
    const izqLista = document.getElementById("botonLeftLista");
    const derLista = document.getElementById("botonRightLista");

    // Inicialización
    if (contenedorCoro.scrollLeft == 0) izqCoro.style.display = "none";
    if (contenedorCoro.scrollWidth <= contenedorCoro.clientWidth) derCoro.style.display = "none";
    if (contenedorVarios.scrollLeft == 0) izqVarios.style.display = "none";
    if (contenedorVarios.scrollWidth <= contenedorVarios.clientWidth) derVarios.style.display = "none";
    if (contenedorLista.scrollLeft == 0) izqLista.style.display = "none";
    if (contenedorLista.scrollWidth <= contenedorLista.clientWidth) derLista.style.display = "none";

    // Eventos botones 
    izqCoro.addEventListener("click", () => {
        izquierda(contenedorCoro, izqCoro, derCoro);
    });

    derCoro.addEventListener("click", () => {
        derecha(contenedorCoro, izqCoro, derCoro);
    });

    izqVarios.addEventListener("click", () => {
        izquierda(contenedorVarios, izqVarios, derVarios);
    });

    derVarios.addEventListener("click", () => {
        derecha(contenedorVarios, izqVarios, derVarios);
    });

    izqLista.addEventListener("click", () => {
        izquierda(contenedorLista, izqLista, derLista);
    });

    derLista.addEventListener("click", () => {
        derecha(contenedorLista, izqLista, derLista);
    });
});