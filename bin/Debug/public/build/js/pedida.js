document.addEventListener("DOMContentLoaded", (e) => {
    botones();
});

function botones() {
    //Hace el donativo
    const paga = document.querySelectorAll(".amarillo");

    paga.forEach(boton => {
        boton.addEventListener("click", (e) => {
            const nombre = boton.dataset.nombre;
            const direccion = boton.dataset.direccion;
            const texto = nombre + " - " + direccion + " ha realizado un donativo ¿Correcto?";
    
            Swal.fire({
                title: "Realiza donativo",
                text: texto,
                showCancelButton: true,
                confirmButtonText: "SI",
              }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/pagaPedida?e=' + boton.dataset.id + '&busca=' + boton.dataset.busca + '&grupo=' + boton.dataset.grupo;
                }
              });
        })
    });

    //Borra la dirección
    const borra = document.querySelectorAll(".naranja");

    borra.forEach(boton => {
        boton.addEventListener("click", (e) => {
            const nombre = boton.dataset.nombre;
            const direccion = boton.dataset.direccion;
            const texto = nombre + " - " + direccion;
    
            Swal.fire({
                title: "¿Desea borrar el registro? No podrá volver a recuperarlo",
                text: texto,
                showCancelButton: true,
                confirmButtonText: "SI",
                color: "#FFF",
                background: "#FF0000",
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
              }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/borraPedida?e=' + boton.dataset.id + '&busca=' + boton.dataset.busca + '&grupo=' + boton.dataset.grupo;
                }
              });
        })
    });
}