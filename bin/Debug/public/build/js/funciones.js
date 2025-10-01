function recuperaValor(cadena) {
    cadena2="";
  
    for (i=0; i<cadena.length; i++) {
        letra = cadena.charAt(i);
        let letraModificada = "";
  
        if (letra == "0") letra=":";
  
        if (letra >="0" && letra <="9") {
            codigo = letra.charCodeAt(0) - 1;
            letraModificada = String.fromCharCode(codigo);
        } else letraModificada = letra;
  
        cadena2 += letraModificada;
    }
  
    return cadena2;
  }

function utf8_encode(s)
{
  return decodeURIComponent(s);
}
