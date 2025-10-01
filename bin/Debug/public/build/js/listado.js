document.addEventListener("DOMContentLoaded", function() {
    const hermanos = "";

    cargaDatos();

    filtros();
});

function filtros() {
    const estado = document.querySelector("#estado");
    const nombre = document.querySelector("#nombre");
    const direccion = document.querySelector("#direccion");
    const poblacion = document.querySelector("#poblacion");
    const sexo = document.querySelector("#sexo");
    const edad = document.querySelector("#edad");
    const fecha = document.querySelector("#fecha");

    estado.addEventListener("change", () => {
        filtrarListado(estado, sexo, nombre, direccion, poblacion, edad, fecha);
    });

    sexo.addEventListener("change", () => {
        filtrarListado(estado, sexo, nombre, direccion, poblacion, edad, fecha);
    })

    edad.addEventListener("change", () => {
        if (fecha.value != "")
            filtrarListado(estado, sexo, nombre, direccion, poblacion, edad, fecha);
    })

    fecha.addEventListener("change", () => {
        if (edad.value != "")
            filtrarListado(estado, sexo, nombre, direccion, poblacion, edad, fecha);
    })

    nombre.addEventListener("keyup", () => {
        nombre.value = nombre.value.toUpperCase();
        filtrarListado(estado, sexo, nombre, direccion, poblacion, edad, fecha);
    });

    direccion.addEventListener("keyup", () => {
        direccion.value = direccion.value.toUpperCase();
        filtrarListado(estado, sexo, nombre, direccion, poblacion, edad, fecha);
    });

    poblacion.addEventListener("keyup", () => {
        poblacion.value = poblacion.value.toUpperCase();
        filtrarListado(estado, sexo, nombre, direccion, poblacion, edad, fecha);
    });
}

function filtrarListado(estado, sexo, nombre, direccion, poblacion, edad, fecha) {
    let filtro = hermanos;

    if (estado.value != "-1") {
        filtro = hermanos.filter(hermanos => hermanos.estado == estado.value);
    } else {
        filtro = hermanos;
    }

    if (sexo.value != "-1") {
        filtro = filtro.filter(filtro => filtro.sexo == sexo.value);
    }

    if (edad.value != "" && fecha.value != ""){
        filtro = filtro.filter(comparaFecha);
    }

    if (nombre.value.length >2)  {
        filtro = filtro.filter(filtro => filtro.nombre.indexOf(nombre.value) > -1);
    }

    if (direccion.value.length >2)  {
        filtro = filtro.filter(filtro => filtro.direccion.indexOf(direccion.value) > -1);
    }

    if (poblacion.value.length >2)  {
        filtro = filtro.filter(filtro => filtro.poblacion.indexOf(poblacion.value) > -1);
    }

   cargaTabla(filtro);
}

function comparaFecha(filter) {
    const fecha = document.querySelector("#fecha");
    const edad = document.querySelector("#edad");

    let fechaD = fecha.value.split("-"); 
    const fechaDestino = new Date(Math.floor(fechaD[0]) - Math.floor(edad.value), Math.floor(fechaD[1]), Math.floor(fechaD[2]));

    fechaD = filter.fecha_nacimiento.split("-");
    const fechaNacimiento = new Date(Math.floor(fechaD[0]), Math.floor(fechaD[1]), Math.floor(fechaD[2]));

    if (fechaNacimiento < fechaDestino) {
        return true; 
    } else false;
}

async function cargaDatos() {
    const respuesta = await fetch('/API/listado');

    hermanos = await respuesta.json();

    hermanos.forEach(hermano => {
        hermano.dni = recuperaValor(hermano.dni);
        hermano.cp = recuperaValor(descifrar(hermano.cp));
        hermano.cp_envio = recuperaValor(descifrar(hermano.cp_envio));
        hermano.movil = recuperaValor(descifrar(hermano.movil));
        hermano.banco = recuperaValor(descifrar(hermano.banco));
    });

    cargaTabla(hermanos);
}

function cargaTabla(hermanos) {
    let clase ="";
    const tabla = document.querySelector('#tabla');
    tabla.innerHTML = "";

    const cabecera = document.createElement("TR");
    cabecera.innerHTML = "<th class='titulo_tabla'>Ant</th><th class='titulo_tabla'>Nombre</th><th class='titulo_tabla'>Apellidos</th><th class='titulo_tabla'>Dirección</th><th class='titulo_tabla'>Población</th><th class='titulo_tabla'>Estado</th>";

    tabla.appendChild(cabecera);

    const tipos = ["Baja", "Hermano", "Fallecido", "Hermano sigue pagando"];

    hermanos.forEach(hermano => {
        let estadoHermano = tipos[hermano.estado];

        if (hermano.pagado_hasta == -1)
            estadoHermano = "Exento de pago";

        const tr = document.createElement("TR");
        if (clase != "") tr.classList.add(clase);

        const today = new Date();
        const anos = today.getFullYear() - hermano.fecha_alta.substring(0, 4);

        let ant;
        
        if (hermano.antiguedad >0 )
            ant = hermano.antiguedad + " (" + anos + ")";
        else
            ant = hermano.antiguedad;
        
        tr.innerHTML = "<td>" + ant + "</td><td><a href='/editar?i=" + hermano.id +"'>" + utf8_encode(hermano.nombre) + "</a></td><td><a href='/editar?i=" + hermano.id +"'>" + utf8_encode(hermano.apellidos) + "</a></td><td><a href='/editar?i=" + hermano.id +"'>" + utf8_encode(hermano.direccion) + "</a></td><td><a href='/editar?i=" + hermano.id +"'>" + utf8_encode(hermano.poblacion) + "</a></td><td>" + estadoHermano +"</td>";

        tabla.appendChild(tr);
        if (clase=="") clase="linea2"; else clase="";
    });

    const total = hermanos.length;
    const barraEstado = document.querySelector("#barra-estado");

    const elementos = document.createElement("P");
    elementos.innerHTML = total + " elementos listados.";

    barraEstado.innerHTML="";
    barraEstado.appendChild(elementos);

}
