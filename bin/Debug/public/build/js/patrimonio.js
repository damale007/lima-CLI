document.addEventListener("DOMContentLoaded", () => {
    // Código para tarjetas Enseres
    const contenedorEnseres = document.getElementById("tarjetasEnseres");
    const izqEnseres = document.getElementById("botonLeftEnseres");
    const derEnseres = document.getElementById("botonRightEnseres");

    // Tarjetas de Insignias
    const contenedorInsignias = document.getElementById("tarjetasInsignias");
    const izqInsignias = document.getElementById("botonLeftInsignias");
    const derInsignias = document.getElementById("botonRightInsignias");

    // Musical
    const contenedorMusical = document.getElementById("tarjetasMusical");
    const izqMusical = document.getElementById("botonLeftMusical");
    const derMusical = document.getElementById("botonRightMusical");

    // Inicialización tarjetas Enseres
    if (contenedorEnseres.scrollLeft == 0) izqEnseres.style.display = "none";
    if (contenedorEnseres.scrollWidth <= contenedorEnseres.clientWidth) derEnseres.style.display = "none";

    // Inicialización tarjetas Insignias
    if (contenedorInsignias.scrollLeft == 0) izqInsignias.style.display = "none";
    if (contenedorInsignias.scrollWidth <= contenedorInsignias.clientWidth) derInsignias.style.display = "none";

    // Inicialización Musical
    if (contenedorMusical.scrollLeft == 0) izqMusical.style.display = "none";
    if (contenedorMusical.scrollWidth <= contenedorMusical.clientWidth) derMusical.style.display = "none";

    // Eventos botones Tarjetas Enseres
    izqEnseres.addEventListener("click", () => {
        izquierda(contenedorEnseres, izqEnseres, derEnseres);
    });

    derEnseres.addEventListener("click", () => {
        derecha(contenedorEnseres, izqEnseres, derEnseres);
    });

    // Eventos botones Tarjetas Insignias
    izqInsignias.addEventListener("click", () => {
        izquierda(contenedorInsignias, izqInsignias, derInsignias);
    });

    derInsignias.addEventListener("click", () => {
        derecha(contenedorInsignias, izqInsignias, derInsignias);
    });

    // Eventos botones Musical
    izqMusical.addEventListener("click", () => {
        izquierda(contenedorMusical, izqMusical, derMusical);
    });

    derMusical.addEventListener("click", () => {
        derecha(contenedorMusical, izqMusical, derMusical);
    });

    function izquierda(contenedor, izq, der) {
        if (contenedor.scrollLeft > 340) {
            contenedor.scrollTo({
                left: contenedor.scrollLeft - 340,
                behavior: 'smooth'
            });
            der.style.display="block";
        } else {
            contenedor.scrollTo({
                left: 0,
                behavior: 'smooth'
            });

            izq.style.display = "none";
        }
    }

    function derecha(contenedor, izq, der) {
        contenedor.scrollTo({
            left: contenedor.scrollLeft + 340,
            behavior: 'smooth'
          });

          izq.style.display = "block";

          if (contenedor.scrollLeft + contenedor.clientWidth + 340 >= contenedor.scrollWidth) der.style.display="none";
        }
});