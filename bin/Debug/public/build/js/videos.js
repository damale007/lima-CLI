document.addEventListener("DOMContentLoaded", () => {
    // Código
    const contenedorRecientes = document.getElementById("tarjetasRecientes");
    const izqRecientes = document.getElementById("botonLeftRecientes");
    const derRecientes = document.getElementById("botonRightRecientes");
    const contenedorFiestas = document.getElementById("tarjetasFiestas");
    const izqFiestas = document.getElementById("botonLeftFiestas");
    const derFiestas = document.getElementById("botonRightFiestas");
    const contenedorSpots = document.getElementById("tarjetasSpots");
    const izqSpots = document.getElementById("botonLeftSpots");
    const derSpots = document.getElementById("botonRightSpots");
    const contenedorFormacion = document.getElementById("tarjetasFormacion");
    const izqFormacion = document.getElementById("botonLeftFormacion");
    const derFormacion = document.getElementById("botonRightFormacion");
    const contenedorActos = document.getElementById("tarjetasActos");
    const izqActos = document.getElementById("botonLeftActos");
    const derActos = document.getElementById("botonRightActos");
    const contenedorMusica = document.getElementById("tarjetasMusica");
    const izqMusica = document.getElementById("botonLeftMusica");
    const derMusica = document.getElementById("botonRightMusica");
    const contenedorProgramas = document.getElementById("tarjetasProgramas");
    const izqProgramas = document.getElementById("botonLeftProgramas");
    const derProgramas = document.getElementById("botonRightProgramas");
    const contenedorLegion = document.getElementById("tarjetasLegion");
    const izqLegion = document.getElementById("botonLeftLegion");
    const derLegion = document.getElementById("botonRightLegion");

    // Inicialización
    if (contenedorRecientes.scrollLeft == 0) izqRecientes.style.display = "none";
    if (contenedorRecientes.scrollWidth <= contenedorRecientes.clientWidth) derRecientes.style.display = "none";
    if (contenedorFiestas.scrollLeft == 0) izqFiestas.style.display = "none";
    if (contenedorFiestas.scrollWidth <= contenedorFiestas.clientWidth) derFiestas.style.display = "none";
    if (contenedorSpots.scrollLeft == 0) izqSpots.style.display = "none";
    if (contenedorSpots.scrollWidth <= contenedorSpots.clientWidth) derSpots.style.display = "none";
    if (contenedorFormacion.scrollLeft == 0) izqFormacion.style.display = "none";
    if (contenedorFormacion.scrollWidth <= contenedorFormacion.clientWidth) derFormacion.style.display = "none";
    if (contenedorActos.scrollLeft == 0) izqActos.style.display = "none";
    if (contenedorActos.scrollWidth <= contenedorActos.clientWidth) derActos.style.display = "none";
    if (contenedorMusica.scrollLeft == 0) izqMusica.style.display = "none";
    if (contenedorMusica.scrollWidth <= contenedorMusica.clientWidth) derMusica.style.display = "none";
     if (contenedorProgramas.scrollLeft == 0) izqProgramas.style.display = "none";
    if (contenedorProgramas.scrollWidth <= contenedorProgramas.clientWidth) derProgramas.style.display = "none";
     if (contenedorLegion.scrollLeft == 0) izqLegion.style.display = "none";
    if (contenedorLegion.scrollWidth <= contenedorLegion.clientWidth) derLegion.style.display = "none";

    // Eventos botones 
    izqRecientes.addEventListener("click", () => {
        izquierda(contenedorRecientes, izqRecientes, derRecientes);
    });

    derRecientes.addEventListener("click", () => {
        derecha(contenedorRecientes, izqRecientes, derRecientes);
    });

    izqFiestas.addEventListener("click", () => {
        izquierda(contenedorFiestas, izqFiestas, derFiestas);
    });

    derFiestas.addEventListener("click", () => {
        derecha(contenedorFiestas, izqFiestas, derFiestas);
    });

    izqSpots.addEventListener("click", () => {
        izquierda(contenedorSpots, izqSpots, derSpots);
    });

    derSpots.addEventListener("click", () => {
        derecha(contenedorSpots, izqSpots, derSpots);
    });

    izqFormacion.addEventListener("click", () => {
        izquierda(contenedorFormacion, izqFormacion, derFormacion);
    });

    derFormacion.addEventListener("click", () => {
        derecha(contenedorFormacion, izqFormacion, derFormacion);
    });

    izqActos.addEventListener("click", () => {
        izquierda(contenedorActos, izqActos, derActos);
    });

    derActos.addEventListener("click", () => {
        derecha(contenedorActos, izqActos, derActos);
    });

    izqMusica.addEventListener("click", () => {
        izquierda(contenedorMusica, izqMusica, derMusica);
    });

    derMusica.addEventListener("click", () => {
        derecha(contenedorMusica, izqMusica, derMusica);
    });

    izqProgramas.addEventListener("click", () => {
        izquierda(contenedorProgramas, izqProgramas, derProgramas);
    });

    derProgramas.addEventListener("click", () => {
        derecha(contenedorProgramas, izqProgramas, derProgramas);
    });

    izqLegion.addEventListener("click", () => {
        izquierda(contenedorLegion, izqLegion, derLegion);
    });

    derLegion.addEventListener("click", () => {
        derecha(contenedorLegion, izqLegion, derLegion);
    });
});