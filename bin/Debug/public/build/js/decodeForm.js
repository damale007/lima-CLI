document.addEventListener("DOMContentLoaded", () => {
    decodeForm();
});

function decodeForm() {
    const inputs = document.querySelectorAll("input");

    inputs.forEach(input => {
        if (input.id!='alta' && input.id!='nacimiento' && input.id!='zona' && input.id!='pagado_hasta' && input.id!='submit' && input.id!='estado' && input.id!='id' && input.id !='antiguedad') 
            input.value = utf8_encode(decode(input.value));

        if (input.id=='dni' || input.id=='cp' || input.id=='cp_envio' || input.id=='movil' || input.id=='banco') 
            input.value = recuperaValor(input.value);

        if (input.id!='email')
            input.value = input.value.toUpperCase();
    });
}