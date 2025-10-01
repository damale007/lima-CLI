document.addEventListener("DOMContentLoaded", () => {
    const botones = document.querySelectorAll(".opciones");

    botones.forEach(boton => {
        boton.addEventListener("click", (e) => {

            quitaMenus();

            const menu = document.getElementById("menu" + boton.id);
            const div = document.createElement("div");
            const ul = document.createElement("ul");
            const li = document.createElement("li");
            const li2 = document.createElement("li");
            const li3 = document.createElement("li");
            const enlaceDenuncia = document.createElement("a");
            const bloqueoMensaje = document.createElement("a");
            const bloqueoUsuario = document.createElement("a");
            enlaceDenuncia.textContent = "Denunciar";
            bloqueoMensaje.textContent = "Bloquear mensaje";
            bloqueoUsuario.textContent = "Bloquear usuario";

            div.className = "menuOpcionesComunidad";

            enlaceDenuncia.setAttribute("href", "javascript: denuncia(" + boton.id + ");");
            enlaceDenuncia.className = "enlaceComunidad";

            bloqueoMensaje.setAttribute("href", "/bloquea(" + boton.id + ", 1);");
            bloqueoMensaje.className = "enlaceComunidad";

            bloqueoUsuario.setAttribute("href", "/bloquea(" + boton.dataset.usr + ", 2);");
            bloqueoUsuario.className = "enlaceComunidad";            

            li.appendChild(enlaceDenuncia);
            li2.appendChild(bloqueoMensaje);
            li3.appendChild(bloqueoUsuario);
            ul.appendChild(li);
            ul.appendChild(li2);
            ul.appendChild(li3);

            div.appendChild(ul);
            menu.appendChild(div);
        });
    });
});

function quitaMenus() {
    const menus = document.querySelectorAll(".menuOpcionesComunidad");

    menus.forEach(menu => {
        menu.remove();
    });
}

function bloquea(id, tipo) {
    let mensaje ="";

    switch (tipo) {
        case 1:
            mensaje = "Va a bloquear este mensaje";
            break;
        case 2:
            mensaje = "Va a bloquear este usuario";
            break;
    }

    Swal.fire({
        title: "¿Estás seguro?",
        text: mensaje,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#315531",
        cancelButtonColor: "#ff5733",
        confirmButtonText: "Si, bloquear",
        cancelButtonText: "No"
      }).then((result) => {
        if (result.isConfirmed) {
            switch (tipo) {
                case 1:
                    window.location.href="/bloqueaMensaje?m" + id;
                    break;
                case 2:
                    window.location.href="/bloqueaUsuario?m" + id;
                    break;
            }
        }
      });
}

function denuncia(id) {
    Swal.fire({
        title: "¿Estás seguro?",
        text: "Vas a denunciar el mensaje",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#315531",
        cancelButtonColor: "#ff5733",
        confirmButtonText: "Si, denunciar",
        cancelButtonText: "No"
      }).then((result) => {
        if (result.isConfirmed) {
            fetch('/comunidad/denuncia?i=' + id)
            .then(response => response.json())
            .then(data => {
                if (data.respuesta=="OK") {
                    Swal.fire({
                        title: "Ok.",
                        text: "Has denunciado correctamente el mensaje",
                        icon: "success",
                        confirmButtonColor: "#315531"
                      });
                }
            });
        }
      });

    quitaMenus();
}