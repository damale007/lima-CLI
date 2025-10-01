document.addEventListener("DOMContentLoaded", () => {
    let ano = document.getElementById("ano");
    const contenedorPregoneros = document.getElementById("tarjetasPregoneros");
    const izqPregoneros = document.getElementById("botonLeftPregoneros");
    const derPregoneros = document.getElementById("botonRightPregoneros");


    if (contenedorPregoneros.scrollLeft == 0) izqPregoneros.style.display = "none";
    if (contenedorPregoneros.scrollWidth <= contenedorPregoneros.clientWidth) derPregoneros.style.display = "none";

    izqPregoneros.addEventListener("click", () => {
        izquierda(contenedorPregoneros, izqPregoneros, derPregoneros);
    });

    derPregoneros.addEventListener("click", () => {
        derecha(contenedorPregoneros, izqPregoneros, derPregoneros);
    });


    ano.addEventListener("input", () => {
        var valor = ano.value;

        if (valor.length == 4)
            window.location.href = '/fiestas?year=' + valor;
    })
});