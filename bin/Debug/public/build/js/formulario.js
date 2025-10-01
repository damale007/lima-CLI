(function() {
    const igual = document.querySelector("#igual");

    igual.addEventListener("click", () => {
        // Dirección
        let dir_envio = document.querySelector("#direccion_envio");
        const direccion = document.querySelector("#direccion");

        dir_envio.value = direccion.value;
        // CP
        let cp_envio = document.querySelector("#cp_envio");
        const cp = document.querySelector("#cp");

        cp_envio.value = cp.value;

        //Población
        let dir_poblacion = document.querySelector("#poblacion_envio");
        const poblacion = document.querySelector("#poblacion");

        poblacion_envio.value = poblacion.value;

        //Provincia
        let provincia_envio = document.querySelector("#provincia_envio");
        const provincia = document.querySelector("#provincia");

        provincia_envio.value = provincia.value;
    });
})();