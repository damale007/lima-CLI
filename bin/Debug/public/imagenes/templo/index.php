<?php session_start(); 
  include "../cabecera.php";
  include "../Librerias/funciones.php";
?>

<!DOCTYPE html>
<html lang="es-ES">
<head>
  <meta charset="UTF-8" />
  <meta name="description" content="Historia y datos de interés sobre la Capilla de la Santa Cruz de la Calle Cabo">

  <title>Capilla Santa Cruz Calle Cabo</title>

    <link rel="icon" href="../favicon.ico" />

    <link href="../css/ppal.css" rel="stylesheet" type="text/css" />
    <link href="../css/templo.css" rel="stylesheet" type="text/css" />
    <meta name="viewport" content ="width=device-width,initial-scale=1, user-scalable=yes, minimum-scale=1">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>
<body style=" scroll-behavior: auto;">
    <header>
        <?php cabeceraNew("../"); ?>
    </header>

  <!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
<script type="text/javascript">
    window.cookieconsent_options = {"message":"Usamos cookies para personalizar su experiencia. Si sigue navegando estará aceptando su uso.","dismiss":"Aceptar","learnMore":"<a aria-label='Más información' tabindex='0' class='cc-link' href='../info.php' target='_blank'>Más información</a>","link":null,"theme":"dark-bottom"};
</script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.9/cookieconsent.min.js"></script>
<!-- End Cookie Consent plugin -->
  
  <section class="seccion">
        <br><br>
        <img src="../imagenes/capilla santa cruz calle cabo.webp" class="imagenTitulo"><br>
        <h1>Capilla Santa Cruz Calle Cabo</h1> 
        <article>
            <p>La Capilla de la Santa Cruz de la Calle Cabo está situada en la calle Cabo, 44 de La Palma del Condado (Huelva -España) y fue inaugurada y bendecida el 17 de mayo de 1974. Anteriormente a esta fecha, la Santa Cruz de la Calle Cabo, una vez pasada sus Fiestas y la Novena a la Santa Cruz era guardada en un cajón en la casa de un vecino hasta el año siguiente que era expuesta en una habitación de dicha casa habilitada para la ocasión hasta el día de la Procesión.</p><br>
              <a class='boton2' title='Capilla Santa Cruz Calle Cabo' href="https://www.google.es/maps/@37.3869858,-6.54889,19z" target="_blanck">Ver la localización de la capilla en un mapa</a>
        </article><br>
</section>
    <div class="fondoResaltado textoImagen">
        <article class="celda1">
          <?php
              $cn = new DB_Conexion("2012");

              $row_misa = $cn->ejecutaSQL("SELECT * FROM fiestas WHERE grupo=2 ORDER BY fecha DESC");

              ?>
              <br><br><h2 style="color: white;">El rezo del rosario es una práctica que se realiza a diario en esta Capilla. </h2><br>
              <br><br>  
              <span style="color: white;">En la Capilla de la Santa Cruz de la Calle Cabo, se celebra la Santa Eucaristía normalmente una vez al mes, siendo la próxima en celebrarse el día </span>
              <br><br><div id="resaltar"><?php ponFecha($row_misa['fecha'], 1); ?></div>
        </article>
        <article class="celda1">
            <img src="../imagenes/smisa.webp" alt="Santa Misa" style="width: 100%;">
        </article>
    </div>
<section class="seccion">
  <br>
            <article>
                <!-- InicioWeb -->
                <ins class="adsbygoogle"
                  style="display:block"
                  data-ad-client="ca-pub-9167656526748449"
                  data-ad-slot="5025199159"
                  data-ad-format="auto"></ins>
              <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
              </script>
            </article>
          </section>

    <section class="bloque">
          	<article style="padding-left: 150px; padding-right: 50px;">
            <h2>Historia de la construcción de la Capilla</h2><br>
               <h3>Una ilusión</h3>
			         <p>La Capilla de la Santa de la Calle Cabo era un sueño constante en los cruceros de principio de siglo. Sin embargo no hay constancia oral del suceso hasta el año 1943 cuando Juan Teba "Juan Pilar", Manuel Pinto "El Londro" y Alfonso González "El sillero" exponen a la Junta reunida con carácter extraordinario y con el fin de recaudar fondos para las fiestas, la necesidad de adquirir una casa cuyo derribo permitiera levantar desde los cimientos una Capilla para la Santa Cruz.</p>
			         <h3>Manos a la obra...</h3>
			         <p>El 31 de marzo de 1971, se compró una casa habitación, sita (en aquel tiempo) en calle Cabo 52 (60 actual), pero no cumplía las exigencias en principio previstas. Jesús Teba de manera particular promovió la compra de la casa nº 40 de la calle Cabo, quien como Vice-presidente de la Hermandad no tenía otras miras que el ofrecimiento a la Junta de Gobierno de permutar la casa recién adquirida por él mediante documento privado, ocurriendo esto el 2 de marzo de 1972.</p>
			         <p>Comenzaron viajes a Sevilla para ver monumentos, Ermitas, Basílicas, Iglesias... El encargo fue recibido por Joaquín Gómez Alberca.</p>
			         <p>El derribo de la casa se realizó en marzo de 1972. El día 12 de agosto de 1972 se presentan los bocetos de la fachada y del interior de la Capilla..</p>
			         <p>El 10 de julio de 1972 se comienza la segunda fase de las obras: la cimentación. Comenzaron las tareas de construcción sin pausa alguna,  
			         pero hubo un problema: el dinero. En el ambiente de aquellos años era muy común las rifas. Una de las rifas que tenemos constancia se celebró el día 25 de Noviembre e 1972 obsequiando al premiado con un automóvil marca mini-850 y medio billete de lotería de Navidad del mismo año y cuyo donativo eran 50 pts. (0'30 euros) Pero la economía de la Hermandad no sólo dependía de las rifas, también de otro medio denominado «Operación ladrillo». Este recurso ofrecía una participación de 25 pesetas (0,15 euros) a todo aquel que la adquiriese sin nada a cambio. Según consta, marcó diferencias entre las diferentes propuestas de recaudación de fondos.</p>
			         <p>Desde el 6 de junio de 1972, se levantó las citaras laterales y de fondo y el muro de la fachada. Mientras tanto en la Hermandad aun se cuestionaba la configuración final del altar de la Santa Cruz de acuerdo con lo proyectado por Joaquín Gómez Alberca. Incluso ya se había colocado las viguetas que darían solidez a la estructura cuando hubo que derribarlas para emplazar la sala y el camarín proyectado por José Ramírez Díaz. Este se había inspirado en la Carreta de la Hermandad de la Virgen del Rocío de La Palma.</p>
			         <p>Durante el mes de septiembre de 1973 se colocaron las bóvedas y techos de escayola y molduras del Camarín. También se ubicaron las columnas de mármol rojo. Terminaba el año 1973 con la colocación de los umbrales del presbiterio y las puertas de la Capilla.</p>
			         <p>Comenzaba el año 1974 con la colocación de la solería. También se revistió la fachada y el campanario de piedra caliza. Hubo que desistir de realizarla en mármol por su elevado coste. Cercana la fecha propuesta por la Hermandad se terminó de realizar la fachada y el camarín junto con el arco frontal.</p>
			         <p>El 17 de mayo se aproximaba y aún estaba la fachada incompleta y el interior de la Capilla por pintar. Lo cual obligó a Manuel García Ávila a trabajar con su grupo de voluntarios incluso por las noches.</p>
			         <h3>Bendición e Inauguración de la Capilla</h3>
			         <p>El 17 de mayo de 1974 se Inauguraba y Bendecía la Capilla de la Santa Cruz de la Calle Cabo.</p>
			         <p>Se nombró Madrina de Honor, a título póstumo, a la Sra. Doña Manuela Cepeda Aguilar, Vda. de nuestro Hermano Mayor Honorario D. Juan Teba García.</p>
			         <p>La Bendición se produjo el Viernes 17 de mayo de 1974 con el siguiente orden: Salida de la Hermandad desde la calle Cabo hacia la Parroquia con estandarte e insignias. Se invitaron a todas las Reinas de Fiestas de años anteriores, y la del año actual, con sus Damas acompañadas de la Banda de música de la Legión. Una vez el cortejo en la plaza de España, salió la Santa Cruz hasta el pórtico de la Parroquia y se celebró la Santa Misa, siendo oficiada por el reverendo cura - párroco D. José Arrayás Mora, actuando como concelebrante el Coadjutor D. Antonio Piosa y en la Capilla Musical el grupo cantor y la Banda de Música del Tercio Duque de Alba 2.º de la Gloriosa Legión Española y siendo el Santo Sacrificio ofrecido por el alma de la Sra. Cepeda Vda. de Teba. A continuación se trasladó la Santa Cruz en su paso antiguo hasta la nueva Capilla acompañadas del mismo cortejo y pueblo en general, para su bendición por el Sr. Cura Párroco, se inauguraron del resto de las dependencias de la Hermandad.</p>
			         <h3>Finalización del proyecto</h3>
			         <p>La Hermandad no aspiraba a la inmovilidad, y continuó completando aquellos detalles que faltaban hasta ser finalmente completo todo lo proyectado. A finales del año 1978 se empieza a pintar el arco frontal y el fondo del techo, finalizando el 17 de abril de 1979. Ese mismo año se procedió a quitar el empapelado de la Sala del Camarín sustituyéndolo por una tela con una tintada de color muy similar. El 4 de marzo la Hermandad adquiere los faroles. Al año siguiente se termina el dorado en oro fino de las cornisas del camarín, que se había iniciado en el año 1978. Se procede con la colocación del zócalo y solería de mármol del Camarín donados por Manolita Teba García y Gertrudis Teba Moreno. Finalmente en 1994, con el objeto de terminar la Capilla, se colocaron las vidrieras y se doró en oro fino el arco frontal del camarín y las puertas de paso anexas.</p>
			         <h3>Caracterísiticas</h3>
			         <p>Situada en la calle Cabo nº 36, (hoy nº 40). su extensión es de 100 metros cuadrados. La fachada es de estilo Renacentista Neoclásico, en piedra caliza color crema, se encuentra rematada por un campanario octogonal, éste posee tres campanas de bronce campanil con yugos metálicos. El interior es de estilo Barroco con bóveda de cañón.</p>
			         <p>La Capilla posee ocho vidrieras de 55cm de diámetro, distribuidas de la siguiente forma: Escudo de la Hermandad, el Cáliz y la Hostia iluminada por el Espíritu Santo, misterio de la Navidad, Corazón de Jesús, escudo de la Parroquia de San Juan Bautista, Calvario, anunciación de María por el Arcángel San Gabriel, Corazón  de María.</p>
			         <p>También cuenta con los siguientes altares: Altar de la Virgen de Fátima, Altar de la Virgen del Carmen, Altar del Corazón de Jesús.</p> 
			         <p>El Camarín de la Santa Cruz está realizado emulando las antiguas salas donde era expuesta la Santa Cruz de la Calle Cabo antes de la construcción de la Capilla.
			</article>
     
      <article style = "padding-right: 100px; text-align: center;">
          <a href='javascript: cambiaFoto("sala.jpg");'><img src="sala.jpg" alt="Salas donde se colocaba la Santa Cruz" style='height: 100px;'><br><span class='pieFoto'>La Santa Cruz en la Salas,<br>antes de la Capilla</span></a><br><br>
          <a href='javascript: cambiaFoto("cajon.jpg");'><img src="cajon.jpg" alt="Cajón donde se guardaba la Santa Cruz" style='height: 100px;'><br><span class='pieFoto'>Cajón donde se guardaba la Santa Cruz<br>antes de la Capilla</span></a><br><br>
          <a href='javascript: cambiaFoto("cuadrilla.jpg");'><img src="cuadrilla.jpg" alt="Cuadrilla durante la construcción de la Capilla" style='height: 100px;'><br><span class='pieFoto'>Cuadrilla de trabajo para<br>la construcción de la Capilla</span></a><br><br>
          <a href='javascript: cambiaFoto("construccion.jpg");'><img src="construccion.jpg" alt="Momento durante la construcción de la Capilla" style='height: 100px;'><br><span class='pieFoto'>Construcción de la Capilla</span></a><br><br>
          <a href='javascript: cambiaFoto("plano1.jpg");'><img src="plano1.jpg" alt="Plano del Camarín de la Santa Cruz" style='height: 100px;'><br><span class='pieFoto'>Plano del Camarín de<br>la Capilla de la Santa Cruz</span></a><br><br>
          <a href='javascript: cambiaFoto("bendicion1.jpg");'><img src="bendicion1.jpg" alt="Bendición de la Capilla" style='height: 100px;'><br><span class='pieFoto'>Bendición de la Capilla de la Santa Cruz</span></a><br><br>
          <a href='javascript: cambiaFoto("capilla.jpg");'><img src="capilla.jpg" alt="Exterior de la Capilla en la actualidad" style='height: 100px;'><br><span class='pieFoto'>Capilla de la Santa Cruz en la actualidad</span></a><br><br>
          <a href='javascript: cambiaFoto("interior.jpg");'><img src="interior.jpg" alt="Interior de la Capilla en la actualidad" style='height: 100px;'><br><span class='pieFoto'>Interior de la Capilla de<br>la Santa Cruz en la actualidad</span></a><br>
          </a>
        </article>
      
      </section>
<?php pie("../"); ?>
  </section>
  <script type="text/javascript" src="../js/imagenes.js"></script>
</body>
</html>