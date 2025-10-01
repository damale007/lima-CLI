document.addEventListener("DOMContentLoaded", () => {
    const borrar = document.getElementById("borraTodo");

    borrar.addEventListener("click", () => {
        Swal.fire({
            title: "¿Está seguro que desea borrar todos los bingos?",
            showCancelButton: true,
            confirmButtonText: "Si, borrar",
            denyButtonText: `NO`
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                location.href="/borrarBingo";
            } 
        });
    });
});