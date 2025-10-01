document.addEventListener("DOMContentLoaded", (e) => {
    compruebaPassword();
});

function compruebaPassword() {
    let ps2 = document.querySelector('#password2');
    const ps = document.querySelector('#password');

    ps.addEventListener("blur", (e) => {
        const password = ps.value;

        if (password.length <6) {
            Swal.fire({
                icon: "error",
                title: "Error!",
                text: "La contraseña debe tener al menos 6 caracteres"
              });
        }
    });

    ps2.addEventListener("blur", (e) => {
        const ps1 = ps.value;
        const pscmp = ps2.value;

        if (ps1 != pscmp && ps1.length > 6) {
            ps2.value="";
            Swal.fire({
                icon: "error",
                title: "Error!",
                text: "La contraseña y su repetición no coinciden"
              });
        }
    });
}