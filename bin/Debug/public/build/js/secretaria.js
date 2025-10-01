document.addEventListener("DOMContentLoaded", () => {
    const borraCarro = document.getElementById("borraRomerito");

    borraCarro.addEventListener("click", () => {
        Swal.fire({
            title: "¿Está seguro que desea elimiar el vehículo?",
            showDenyButton: true,
            confirmButtonText: "Si borrar",
            denyButtonText: `No`
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                location.href=borraCarro.dataset.token;
            }
            });
    });
});