document.addEventListener('DOMContentLoaded', function() {
    const lupa = document.getElementById("lupa");
    const cierraBuscador = document.getElementById("cierraBuscador");
    botonMenu();
    botonUsuario();

    lupa.addEventListener("click", () => {
        let contenedor = document.getElementById('buscador');
        contenedor.style.visibility = "visible";
        contenedor.style.opacity = "1";
    });

    cierraBuscador.addEventListener("click", () => {
        setTimeout(function(){ document.getElementById('buscador').style.visibility = "hidden"; }, 300);
        document.getElementById('buscador').style.opacity = "0";
    });
});

function botonMenu() {
    const boton = document.querySelector(".hamburguesa");

    boton.addEventListener('click', function() {
        const menu = document.querySelector('.contenedor-menu');
        const margen = menu.style.marginLeft;

        if (margen != "0px")
            menu.style.marginLeft = "0px";
        else
            menu.style.marginLeft = "-70%";
    });
}

function botonUsuario(){
    const boton = document.querySelectorAll("#despliegaMenu");

    boton.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            const despl = document.getElementsByClassName("desplegar");
            const menuU = document.querySelector(".menu-usuario");
            //const idRuta = document.getElementById("rutaMenu");
            //const ruta = idRuta.innerHTML;

            console.log(menuU.style.top);
            if (menuU.style.top == "7rem") {
                despl[0].setAttribute("src", "/imagenes/desplegar.png");
                menuU.style.top="-40rem"
            } else {
                despl[0].setAttribute("src", "/imagenes/cierra.png");
                menuU.style.top="7rem";
            }
        });
    })
}