(function() {
    //Botones eliminar pagos
    const botones = document.querySelectorAll(".botonAccion");

    botones.forEach(boton => {
        boton.addEventListener("click", () => {
            Swal.fire({
                title: "¿Está seguro que desea borrarlo?",
                icon: "question",
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: "Si",
                denyButtonText: `No`
              }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                  if (boton.dataset.tipo == "pago")
                    window.location.href="/borraPago?i=" + boton.id; // + "&u=".boton.dataset.user;
                  else
                    window.location.href="/borraHistorial?i=" + boton.id; // + "&u=".boton.dataset.user;
                } 
              });
        });
    });
})();