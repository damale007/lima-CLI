document.addEventListener("DOMContentLoaded", () => {
    const imagenes = document.querySelectorAll("#imagen");

    imagenes.forEach(function (item) {
        item.addEventListener("click", () => {
            cambiaFoto(item.src);
        });
    });
// capturar los eventos de todos 

});

function cambiaFoto(imagen){
    document.getElementById("imagen").src="";
    document.getElementById("imagen").src=imagen;

    let contenedor = document.getElementById('contenedorImagen');
    contenedor.style.visibility = "visible";
    contenedor.style.opacity = "1";
}

function cierra(){
    setTimeout(function(){ document.getElementById('contenedorImagen').style.visibility = "hidden"; }, 300);
    document.getElementById('contenedorImagen').style.opacity = "0";
}

