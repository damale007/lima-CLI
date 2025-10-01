    <div class="video">
        <div class="overlay">
            <div class='textoCabecera'>
                <img src="imagenes/escudo hermandad calle cabo.webp" alt="Escudo Santa Cruz Calle Cabo">
                <h1>Real, Franciscana y Fervorosa Hermandad de la Santa Cruz de la Calle Cabo, Santa Caridad y Ntra. Sra. del Rosario</h1>
            </div>
        </div>

        <video autoplay loop muted class="tamVideo">
            <source src="multimedia/introweb.mp4" type="video/mp4"/>
        </video>

        <img src="imagenes/izquierda.webp" class="botonCarruselVideo botonCarruselIzquierda" id="botonLeft"/>
        <img src="imagenes/derecha.webp" class="botonCarruselVideo botonCarruselDerecha" id="botonRight"/>

        <div class="tarjetasTramites" id="tarjetas">
            <?php if ($tarjetaCoronacion) { ?>
                <a href="/entradaCoronacion">
                    <div class="tramite">
                        <p class="titulo">coronación</p>
                        <p class="centrado">Abierto el plazo para reservar entradas para la Coronación.</p>
                        <p class="centrado">Tiene reservada <?= $totalEntradas; ?> entrada<?php if ($totalEntradas != 1) echo "s"; ?></p>
                        <p class="centrado">El sorteo será el 
                        <?= $sorteoCoronacion; ?> de mayo.
                        </p>
                    </div>
                </a>
            <?php } ?>

            <?php if ($tarjetaRomerito) { ?>
                <a href="/vehiculoRomerito">
                    <div class="tramite">
                        <p class="titulo">romerito <?= date("Y"); ?></p>
                        <p class="centrado">Abierto el plazo para apuntar un vehículo al Romerito <?= date("Y"); ?></p>
                        <p class="centrado">
                        <?php if ($vehiculos >0) echo "Tiene apuntado un vehículo"; ?>
                        </p>
                        <p class="centrado">El sorteo será el 
                        <?= $sorteoRomerito; ?> de mayo.
                        </p>
                    </div>
                </a>
            <?php } ?>

            <?php if ($tarjetaPuja) { ?>
                <a href="/pujaCohete">
                    <div class="tramite">
                        <p class="titulo">Puja Cohete</p>
                        <p class="destacado"><?= $pujaActual; ?> €</p>
                        <p class="centrado"><?= $nombrePujaActual; ?></p>
                    </div>
                </a>
            <?php } ?>

            <a href="/secretaria">
                <div class="tramite">
                    <p class="titulo">Secretaría</p>
                    <p>desde aquí podrá realizar trámites, apuntar a hermnos, reinas...</p>
                </div>
            </a>

            <?php if ($horaRosario != "") { ?>
                <div class="tramite">
                    <p class="titulo">Rosario</p>
                    <p>Se reza en la Capilla de la Santa Cruz de la Calle Cabo diariamente</p>
                    <p class="destacado"><?= $horaRosario; ?></p>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- PRÓXIMOS EVENTOS -->
    <section class="actualidad">
        <div class="eventos">
            <h2 class="subrayado">Próximos eventos</h2>
            <br><br>
            <?php $ultimoGrupo = 0; $impresos = 0;?>
            
            <?php foreach($eventos as $evento) { ?>
                <?php if ($impresos<3) { ?>
                <?php  if ($ultimoGrupo != $evento->id_grupo) { ?>
                    <?php $ultimoGrupo = $evento->id_grupo; ?>   <!-- Imprime grupo -->
                        <?php $grupo = obtenGrupoEvento($evento->id_grupo); ?>
                        <a href="/evento/<?= $grupo->id."/".date("Y"); ?>">
                            <p class="tituloGrupoEvento">
                                <?= $grupo->titulo; ?>
                            </p>
                            <img src="<?= $grupo->imagen; ?>" class="imagenEvento">
                            <p class="fechaEvento"> <?= dateFormat($evento->fecha); ?> </p>
                            <?php $impresos++; ?>
                        </a>
                        <p class="lineaEvento"><?= $evento->titulo; ?></p>
                <?php } else { ?>
                    <p class="lineaEvento"><?= $evento->titulo; ?></p>
                <?php } ?>

            <?php } }?>
        </div>

        <div class="noticias">
            <h2 class="subrayado">Últimas noticias</h2>
            <br><br>
            <?php foreach($noticias as $noticia) {?>
                <a href="/noticia/<?= $noticia->id; ?>">
                    <div class="contenedor-noticia">
                        <div class="contenedor-imagen">
                            <img loading="lazy" src="<?= $noticia->imagen; ?>" alt="<?= $noticia->titulo; ?>" class="imagen-noticia"/>
                        </div>
                        <div class="texto">
                            <p class="titulo-noticia"><?= $noticia->titulo; ?></p>
                            <p class="titular-noticia"><?= $noticia->titular; ?></p>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </section>

    <section class='publicidad'>
    </section>

    <br><br><br>


     <section>
        <h2 class="tituloSeccion">Titulares de la Hermandad</h2>
        <div class="ajuste">
            <div class="celda titularHermandad">
                <a href="/calleCabo">
                    <div class="textoTitular1">
                        Santa Cruz de la 
                    </div>
                    <div class="textoTitular2">
                        Calle Cabo
                    </div>
                    <img src="../imagenes/Santa Cruz de la Calle Cabo.webp" alt="Santa Cruz Calle Cabo" loading="lazy" class="imagenAjuste sombra">
                </a>
            </div>

            <div class="celda titularHermandad">
                <a href="/virgenRosario">
                    <div class="textoTitular1">
                        Ntra. Sra. del 
                    </div>
                    <div class="textoTitular2">
                        Rosario
                    </div>
                    <img src="../imagenes/Virgen Rosario.webp" alt="Ntra. Sra. del Rosario" loading="lazy" class="imagenAjuste sombra">
                </a>
            </div>

            <div class="celda titularHermandad">
                <a href="/caridad">
                    <div class="textoTitular1">
                        Santa 
                    </div>
                    <div class="textoTitular2">
                        Caridad
                    </div>
                    <img src="../imagenes/Santa Caridad.webp" alt="Santa Caridad" loading="lazy" class="imagenAjuste sombra">
                </a>
            </div>
        </div>
    </section>

    <br><br><br>

    <section class="barra-verde">
        <h2 class="tituloSeccionOscuro">Devoción a la Santa Cruz de la Calle Cabo</h2>
        <br>
        <p class="textoDescripcion">Existe una Leyenda que puede ser el origen de nuestra Hermandad, iniciándose así la veneración a la Santa Cruz de la Calle Cabo, aunque no es hasta el 6 de octubre de 1986 cuando se firman las primeras reglas.</p>

        <div class="ajuste">
            <a href="/historia" class='caja' style="width: 15rem">
                <img src="imagenes/historia.webp" alt='foto histórica' loading='lazy'>
                <p class="textoCajaAncha negrita" style="color: white;">
                    Historia
                </p>
            </a>

            <a href="/reglas" class='caja' style="width: 15rem">
                <img src="imagenes/libroDeReglasCalleCabo.webp" alt="Libro de reglas" loading='lazy'>
                <p class="textoCaja negrita" style='color: white;'>
                    Reglas
                </p>
            </a>

            <a href="/archivo" class='caja' style="width: 15rem">
                <img src="imagenes/archivo.webp" alt='periódico antiguo' loading='lazy'>
                <p class="textoCaja negrita" style='color: white;'>
                    Archivo
                </p>
            </a>

            <a href="https://www.facebook.com/gj.callecabo?locale=es_ES" target="_blank" class="caja" style="width: 15srem">
                <img src="imagenes/joba.webp" alt="Banderín del Grupo Joven" loading='lazy'>
                <p class="textoCajaAncha negrita" style="color: white;">
                    Grupo Joven
                </p>
            </a>
        </div>
    </section>

           
    <br><br>
    <section>
        <h2 class="tituloSeccion centrado">Cultos a la Santa Cruz de la Calle Cabo</h2>
        <p class="centrado">Esta Hermandad, como viene establecido en sus reglas en el artículo 81 determina que los cultos son los siguiente:</p>

        <div class="padreCarrusel">
            <img src="imagenes/izquierda.webp" class="botonCarrusel botonCarruselIzquierda" id="botonLeftCultos"/>
            <img src="imagenes/derecha.webp" class="botonCarrusel botonCarruselDerecha" id="botonRightCultos"/>

            <div class="carrusel" id="tarjetasCultos">
                <div>
                    <a href="/viacrucis">
                        <div class="caja alto">
                            <img src="../imagenes/ViaCrucis mini.webp">
                            <div class="textoCaja negrita">
                                Via Crucis
                            </div>
                        </div>
                    </a>
                </div>

                <div>
                    <a href="/triduo">
                        <div class="caja alto">
                            <img src="../imagenes/culto1.webp">
                            <div class="textoCaja negrita">
                                Triduo
                            </div>
                        </div>
                    </a>
                </div>

                <div class="tramite">
                    <a href="/santorosario">
                        <div class="caja alto">
                            <img src="../imagenes/culto2.webp">
                            <div class="textoCaja negrita">
                                Santo Rosario
                            </div>
                        </div>
                    </a>
                </div>

                <div class="tramite">
                    <a href="/funcion">
                        <div class="caja alto">
                            <img src="../imagenes/culto3.webp">
                            <div class="textoCaja negrita">
                                Función Principal
                            </div>
                        </div>
                    </a>
                </div>

                <div class="tramite">
                    <a href="/novena">
                        <div class="caja alto">
                            <img src="../imagenes/culto4.webp">
                            <div class="textoCaja negrita">
                                Novena
                            </div>
                        </div>
                    </a>
                </div>

                <div class="tramite">
                    <a href="/exaltacion">
                        <div class="caja alto">
                            <img src="../imagenes/culto5.webp">
                            <div class="textoCaja negrita">
                                Exaltación de la Cruz
                            </div>
                        </div>
                    </a>
                </div>

                <div class="tramite">
                    <a href="/misas">
                        <div class="caja alto">
                            <img src="../imagenes/culto6.webp">
                            <div class="textoCaja negrita">
                                Misas en la Capilla
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section>
        <h2 class="tituloSeccion">Formación</h2>
        <div class="textoDescripcion">
            <p>La Hermandad de la Santa Cruz de la Calle Cabo, se toma muy en serio la formación, ya que como dijo D. Enrique Esquivias en una de las Charlas organzadas por esta Hermandad, la falta de formación es una de las causas de la pobreza, ya que dos personas que pasan una mala racha, la que está bien formada es mucho más probable que salga de ella.</p>
            <p>Por ello, la Hermandad y su Vocalía de Formación, no escatiman esfuerzos en organizar cada año el ciclo de charlas formativas tituladas "Charlas en la Calle Cabo", y que desde el pasado año 2006 está recibiendo una muy buena acogida, no solo de asistencia, sino también de audiencia</p>

            <div class="carrusel">
                <div class="tarjeta">
                    <img src="/imagenes/charlas.webp" loading="lazy" alt="Charlas en la Calle Cabo" class="iconoMusica">
                    <p class="titulo">Charlas en la Calle Cabo</p>
                    <br><br>
                    <p class="centrado"><a href="/charlas" class="botonTransparente">Más información</a></p>
                </div>

                <div class="tarjeta">
                    <img src="/imagenes/catequesis.webp" loading="lazy" alt="Catequesis en la Calle Cabo" class="iconoMusica">
                    <p class="titulo">Catequesis</p>
                    <br><br>
                    <p class="centrado">
                        <a href="/catequesis" class="botonTransparente">Más información
                        </a>
                    </p>
                </div>  

                <div class="tarjeta">
                    <img src="/imagenes/escuelaOracion.webp" loading="lazy" alt="Escuela de oración en la Calle Cabo" class="iconoMusica">
                    <p class="titulo">Escuela de oración</p>
                    <br><br>
                    <a href="/escuelaOracion" class="botonTransparente">Más información</a>

                </div>

                <div class="tarjeta">
                    <img src="/imagenes/evangelio.png" loading="lazy" alt="Evangelio del día" class="iconoMusica">
                    <p class="titulo">Evangelio del día</p>
                    <br><br>
                    <a href="/evangelio" class="botonTransparente">Más información</a>

                    </div>
            </div>
        </div>
    </section>

    <section class="barra-verde">
        <h2 class="tituloSeccion">Junta de Gobierno</h2>
        
        <div class="padreCarrusel" style="height: 18rem;">
            <img src="imagenes/izquierda.webp" class="botonCarrusel botonCarruselIzquierda" id="botonLeftJunta"/>
            <img src="imagenes/derecha.webp" class="botonCarrusel botonCarruselDerecha" id="botonRightJunta"/>

            <div class="carrusel" id="tarjetasJunta">
                <?php foreach($junta as $j) { ?>
                    <a href="/juntaDetalle/<?= $j->id; ?>">
                        <div style='margin: 1.5rem;'>
                            <div class="avatar">
                                <img src="<?=$j->imagen; ?>" alt="<?= $j->nombre; ?>" loading="lazy" class="ancho">
                            </div>
                            <p class="centrado">
                                <?= $j->nombre; ?>
                            </p>
                            <p class="centrado">
                                <?= $j->cargo; ?>
                            </p>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
        <br><br>
        <p class='centrado' style='text-align: center;'>
            <a href="/verJunta/<?= $junta[0]->ano; ?>" class="boton oscuro" style='display: inline-block;'>Ver todos los miembros</a>
        </p>
        <br>
        <hr>

        <div class="padreCarrusel">
            <img src="imagenes/izquierda.webp" class="botonCarrusel botonCarruselIzquierda" id="botonLeftOtros"/>
            <img src="imagenes/derecha.webp" class="botonCarrusel botonCarruselDerecha" id="botonRightOtros"/>

            <div class="carrusel" id="tarjetasOtros">

                <a href="/templo">
                    <div class="caja altoAuto">
                        <img src="imagenes/templo.webp">
                        <div class="textoCaja negrita">
                            Templo
                        </div>
                    </div>
                </a>

                <a href="/coro">
                    <div class="caja altoAuto">
                        <img src="imagenes/coro.webp">
                        <div class="textoCaja negrita">
                            Coro
                        </div>
                    </div>
                </a>

                <a href="/patrimonio">
                    <div class="caja altoAuto">
                        <img src="imagenes/patrimonio.webp">
                        <div class="textoCaja negrita">
                            Patrimonio
                        </div>
                    </div>
                </a>

                <a href="/orla">
                    <div class="caja altoAuto">
                        <img src="imagenes/orla.webp">
                        <div class="textoCaja negrita">
                            Orla de honor
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <br><br>
    <section class="centrado">
        Real, Franciscana y Fervorosa Hermandad de la Santa Cruz de la Calle Cabo, Santa Caridad y Ntra. Sra. del Rosario<br>
        C/ Comandante Herce, 3 - Capilla: C/ Cabo, 41<br>
        21700 - La Palma del Condado (Huelva - España)
    </section>

    <br><br>

    <?php 
        $script = ["botonesCarrusel", "index"]; ?>