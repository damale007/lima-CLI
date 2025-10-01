document.addEventListener("DOMContentLoaded", (e) => {
    inicia();
});

function inicia() {
    const paso1 = document.querySelector("#paso-1");
    const paso2 = document.querySelector("#paso-2");
    const botonSiguiente = document.querySelector("#siguiente");
    const botonAtras = document.querySelector("#atras");
    const enviar = document.querySelector("#login");

    paso2.classList.add("oculto");

    botonSiguiente.addEventListener("click", (e) => {
        const email = document.querySelector("#email");

        if (email.value.length>5) {
            compruebaEmail(email.value);

            //paso2.classList.remove("oculto");
            //paso1.classList.add("oculto");
        } else {
            Swal.fire({
                icon: "error",
                title: "Error!",
                text: "El email introducido no es válido"
            });
        }
    });

    botonAtras.addEventListener("click", (e) => {
        paso1.classList.remove("oculto");
        paso2.classList.add("oculto");
    });

    enviar.addEventListener("click", (e) => {
        alert("Ha enviado el formulario");
    })
}

async function compruebaEmail(email) {
    
    const datos = new FormData();
    
    datos.append('email', email);

    try {
        // Petición hacia la api
        const url = 'callecabo.test/api/email'
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        });

        const resultado = await respuesta.json();
        console.log(resultado);
        
        if(resultado.resultado) {
        }
    }catch (error) { alert("ERROR: " + error);}
}