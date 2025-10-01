var objReproductor = new Audio();
var ultimo = "";
var iCancionActual=0;
var isPlay = false;

function Cargar_codigo(codigo, capa)
{
	var contenido;
    contenido = document.getElementById(capa);
    contenido.innerHTML=codigo;
}

function botonAtras()
{
	var iTotalCanciones = document.getElementById('canciones_repr').children.length;

	if (iCancionActual > 0) 
		iCancionActual--; 
	else 
		iCancionActual = iTotalCanciones -1;

	play();
}

function play()
{
	isPlay = true;
    var contenedor = document.getElementById('canciones_repr').children[iCancionActual];

	objReproductor.src = "../multimedia/" + contenedor.getAttribute("rel") + ".mp3";
	objReproductor.play();

    var seleccionado = document.getElementsByClassName("clsSeleccionado");
    for (var i = 0; i<seleccionado.length; i++) {
        seleccionado[i].classList.remove("clsSeleccionado");
    }
    contenedor.classList.add("clsSeleccionado");


	document.getElementById('lblDuracion').innerHTML = '00:00';

    //Obtiene el título de la canción
	let titulo = contenedor.innerHTML;
	let inicio = titulo.indexOf(">");
    titulo = titulo.substring(inicio +1);
    inicio = titulo.indexOf("<a");
	titulo = titulo.substring(0, inicio);

	document.getElementById('lblCancion').innerHTML = "Reproduciendo " + titulo;

	setTimeout(segundo, 1000);
}


function playMitad(cancion)
{
	iCancionActual = cancion;
	play();
}

function pausa()
{
	if (objReproductor.paused)
	{
		isPlay = true;
		if (objReproductor.currentTime>0)
			objReproductor.play();
	}else{
		isPlay = false;
		objReproductor.pause();
	}
}

function adelante()
{
    var iTotalCanciones = document.getElementById('canciones_repr').children.length;

	if (iCancionActual < iTotalCanciones -1) 
        iCancionActual++; 
    else 
        iCancionActual=0;

	play();
}

function segundo(){
	if (isPlay) {
		document.getElementById('lblDuracion').innerHTML = defineTiempo(objReproductor.currentTime) + " / " + defineTiempo(objReproductor.duration);

		if (objReproductor.currentTime > objReproductor.duration) adelante();
		setTimeout(segundo, 1000);
	}
}

function defineTiempo(tiempoCancion) {
	var minutos = Math.trunc(tiempoCancion/60);
	var segundos = tiempoCancion - (minutos * 60);

	var cadena = "";
	if (minutos<10) cadena = "0";
	cadena += minutos + ":";
	
	if (segundos<10) cadena +="0";
	cadena += segundos;

	return cadena;
}
/*	
function cargar(url){
    $.ajax({   
        type: "POST",
        url:url,
        data:{},
        success: function(datos){       
            $('#cargaFondo').html(datos);
        }
    });
}

function listaRepr(id){
    let url="milista.php?c=" + id + "&i=<?php echo $_SESSION['id']; ?>";
    cargar(url);
    var capa = "r" + id;
    alert(capa);
    $(capa).html("");
}*/