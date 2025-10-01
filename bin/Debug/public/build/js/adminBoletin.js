document.addEventListener("DOMContentLoaded", () => {
    const ano =document.getElementById("ano");
    const Tano = document.getElementById("Tano");
    
    const definir = document.getElementById("definir");

    ano.type = "hidden";
    Tano.innerHTML = "";

    definir.addEventListener("click", () => {
        ano.type = "text";
        Tano.innerHTML = "Año";
        pagina.type = "text";
        Tpagina.innerHTML = "Página";

        document.getElementById("autor").type="hidden";
        document.getElementById("seccion").type="hidden";
        document.getElementById("Tautor").innerHTML="";
        document.getElementById("Tseccion").innerHTML="";
        document.getElementById("pagina").value="0";    
        document.getElementById("pagina").type="hidden"; 
        document.getElementById("Tpagina").innerHTML=""; 
        document.getElementById("Tcargo").innerHTML="URL de la portada";    
        document.getElementById("Ttitulo").innerHTML="URL del PDF";    
    });
});