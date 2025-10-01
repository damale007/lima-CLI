document.addEventListener("DOMContentLoaded", () => {
    const botones = document.querySelectorAll(".boton");

    botones.forEach(boton => {
        boton.addEventListener("click", (e) => {
            var mensaje;
            var url;

            if (boton.dataset.tipo == "M") {
                mensaje = "Va a desbloquear el mensaje";
                url = "/desbloquea?t=0&m=" + boton.id;
            }
            else {
                mensaje = "Va a desbloquear al usuario";
                url = "/desbloquea?t=1&m=" + boton.id;
            }

            Swal.fire({
                title: "¿Estás seguro?",
                text: mensaje,
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#315531",
                cancelButtonColor: "#ff5733",
                confirmButtonText: "Si, desbloquear",
                cancelButtonText: "No"
              }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href=url;
                }
              });
        
        });
    });
});