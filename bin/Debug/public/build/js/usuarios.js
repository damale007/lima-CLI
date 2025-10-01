document.addEventListener("DOMContentLoaded", () => {

    cargaDatos();
    eventos();

});

function eventos() {
    const buscar = document.querySelector("#buscar");
    const hermanos = document.querySelector("#hermanos");
    const noHermanos = document.querySelector("#noHermanos");

    buscar.addEventListener("keyup", () => {
        filtrarListado(buscar, "");
    });

    hermanos.addEventListener("click", () => {
        filtrarListado(buscar, "S");
    });

    noHermanos.addEventListener("click", () => {
        filtrarListado(buscar, "N");
    });
}

function filtrarListado(buscar, hermano) {
    let filtro = usuarios;

    if (hermano != "")
        filtro = filtro.filter(filtro => filtro.hermano == hermano);

    if (buscar.value.length >2)  {
        filtro = filtro.filter(filtro => filtro.nombre.indexOf(buscar.value) > -1 || filtro.email.indexOf(buscar.value) > -1 || filtro.apellidos.indexOf(buscar.value) > -1);
    }

   cargaContenido(filtro);
}

async function cargaDatos() {
    const respuesta = await fetch('/API/usuarios');

    usuarios = await respuesta.json();

    cargaContenido(usuarios);
}

function cargaContenido(usuarios) {

    let clase ="";
    const contenido = document.querySelector('#contenidoUsuarios');
    contenido.innerHTML = "";

    usuarios.forEach(usuario => {

        const p = document.createElement("P");

        p.innerHTML = "<a href='/edita-perfil?id=" + usuario.id + "'>ID: " + usuario.id + " - " + utf8_encode(usuario.email) + " - " + utf8_encode(usuario.nombre) + " " + utf8_encode(usuario.apellidos) + " - DNI: " + usuario.dni + "</a>";

        contenido.appendChild(p);
    });
}
