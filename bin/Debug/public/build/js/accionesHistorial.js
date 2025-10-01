(function(){
    const sel = document.querySelector("#tipo");
    const formulario = document.querySelector("form");

    formulario.addEventListener("submit", function(event) {
        event.preventDefault();
        const estado = document.querySelector("#estado");

        if (sel.value == estado.value) {
            Swal.fire({
                title: "Atención",
                text: "No puede crear un historial igual al estado del hermano",
                icon: "warning",
            });
        } else {
            if ((sel.value < 2) && (estado.value >1)) {
                Swal.fire({
                    title: "Atención",
                    text: "Un fallecido no puede cambiar su estado",
                    icon: "warning",
                });
            } else {
                if (sel.value == 0 || sel.value == 2 || sel.value == 3) {
                    Swal.fire({
                        title: "¿Está seguro?",
                        text: "Al realizar ese proceso perderá la antigüedad y no podrá volver a recuperarla",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "SI"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            formulario.submit();
                        }
                    });
                } else {
                    formulario.submit();
                }
            }
        }
    });
})();