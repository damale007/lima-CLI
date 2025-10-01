document.addEventListener("DOMContentLoaded", () => {
    let password = document.getElementById("password");
    let repetir = document.getElementById("repetir");

    repetir.addEventListener("focusout", () => {
        if (password.value != repetir.value) {
            repetir.value="";
            password.value="";
            Swal.fire({
                icon: "error",
                title: "Error!",
                text: "Los campos contraseña y repetir contraseña deben coincidir"
              });
        }
    });
});