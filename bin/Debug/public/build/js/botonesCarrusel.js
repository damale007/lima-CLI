function izquierda(contenedor, izq, der) {
        if (contenedor.scrollLeft > 340) {
            contenedor.scrollTo({
                left: contenedor.scrollLeft - 340,
                behavior: 'smooth'
            });
            der.style.display="block";
        } else {
            contenedor.scrollTo({
                left: 0,
                behavior: 'smooth'
            });

            izq.style.display = "none";
        }
    }

    function derecha(contenedor, izq, der) {
        contenedor.scrollTo({
            left: contenedor.scrollLeft + 340,
            behavior: 'smooth'
          });

          izq.style.display = "block";

          if (contenedor.scrollLeft + contenedor.clientWidth + 340 >= contenedor.scrollWidth) der.style.display="none";
        }