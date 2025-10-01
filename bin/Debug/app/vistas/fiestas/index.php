<div class='espaciado'></div>
    <br><h1 class = "tituloSeccion tituloH1">Fiestas Santa Cruz Calle Cabo <?= $ano; ?></h1>

    <div class="barraBusca">
        <form>
            Elige un año: <input type="number" name="ano" id="ano" value='<?= $ano; ?>' style="width: 14rem;">
        </form>
    </div>

<div class="documento">
    <div class="ajuste">
        <!-- Triduo -->
        <div class="celdaTercio cajaTransparente">
            <img src="imagenes/triduo Santa Cruz Calle Cabo.webp" loading="lazy" alt="Altar de triudo de la Santa Cruz de la Calle Cabo" class="imagenAnchoTotal">
            <h2>Triduo</h2>
            <p>Se celebra normalmente en el mes de abril en la Iglesia Parroquial de San Juan Bautista. <?= $triduo; ?></p>
            <br><a href="/triduo" class="boton">Más información</a>
        </div>

        <!-- Cartel de Fiestas -->
        <div class="celdaTercio cajaVerde">

            <?php if (!strpos($cartel, "cartel.webp")>0) { ?>
                <a href="/cartel/<?= $ano; ?>">
            <?php } ?>
                <img src="<?= $cartel; ?>" loading="lazy" alt="Cartel de las Fiestas de la Santa Cruz de la Calle Cabo del año <?= $ano; ?>" class="imagenAnchoTotal">
            <?php if (!strpos($cartel, "cartel.webp")>0) { ?>
                </a>
            <?php } ?>

            <h2>Fiestas de Mayo</h2>
            <br><a href="/actos/<?= $ano; ?>" class="boton">Más información</a>
        </div>

        <!-- Septiembre -->
        <div class="celdaTercio cajaTransparente">
            <img src="imagenes/exaltacion de la cruz.webp" loading="lazy" alt="Altar de triudo de la Exaltación de la Santa Cruz de la Calle Cabo" class="imagenAnchoTotal">
            <h2>Exaltación de la Cruz</h2>
            <p>Triduo celebrado los días 11, 12 y 13 de septiembre y Función el día 14.</p>
            <br><a href="/exaltacion" class="boton">Más información</a>
        </div>
    </div>

    <?php require "../app/includes/Calendario.php"; ?>
    <section class="actualidad">
       
        <!-- Otros eventos -->
        <div class="eventos">
            <h2>Otros eventos</h2><br>
            <?php $voy=0; ?>
            <?php foreach ($eventos as $evento) { ?>
                <?php if ($voy<9) {
                    echo "<a href='/evento/".$evento->id_grupo."'><h3>".$evento->titulo."</h3></a>"; 
                    echo dateFormat($evento->fecha)."<br><br>";
                    $voy++;
                }?>
            <?php } ?>
            <a href="/todosEventos/<?= $ano; ?>" class="boton">Más eventos</a>
        </div>
        <!-- Calendario de cultos y actos del año en curso -->
        <div class="noticias">
            <?php pon_calendario($ano, $eventos); ?>
        </div>
    </section>


    <!-- Anuncio -->
   <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- InicioWeb -->
        <ins class="adsbygoogle"
            style="display:block"
            data-ad-client="ca-pub-9167656526748449"
            data-ad-slot="5025199159"
            data-ad-format="auto"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
</div>

<!-- Reina -->
<section class='rellenoVerde'>
    <h2>Reina Santa Cruz Calle Cabo <?= $ano; ?></h2>
    <div class="ajuste">
        <div class="dobleCelda">
            <?php if ($reina->imagen != "/imagenes/reina.webp") { ?>
            <a href="/reina/<?= $ano; ?>">
            <?php } ?>
                <img src="<?= $reina->imagen; ?>" alt="<?= $reina->nombre; ?>, Reina de la Santa Cruz de la Calle Cabo <?= $ano; ?>" class="imagenAnchoTotal" loading="lazy">
                <h2><?= $reina->nombre; ?></h2>
            <?php if ($reina->imagen != "/imagenes/reina.webp") { ?>
            </a>
            <?php } ?>
        </div>

        <!-- Damas -->
        <?php if (!empty($damas)) { ?>
            <div class="dobleCelda">
                <h2>Corte de honor</h2>
                <div class="ajuste">
                    <?php foreach($damas as $dama) { ?>
                        <div class="dobleCelda centrado">
                            <img src="<?= $dama->imagen; ?>" class="imagenDama" loading="lazy">
                            <br>
                            <h3 class="centrado"><?= $dama->nombre; ?></h3>
                            <br>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>

    <!-- Otras Reinas -->
     <?php include "../app/vistas/includes/otrasReinas.php"; ?>
    
</section>

<div class="documento">
    <!-- Pregonero -->
    <h2>Pregonero/a Santa Cruz Calle Cabo <?= $ano; ?></h2>
    <div class="ajuste">
        <div class="dobleCelda">
            <?php if ($pregonero->imagen != "/imagenes/pregonero.webp") { ?>
            <a href="/pregonero/<?= $ano; ?>">
            <?php } ?>
                <img src="<?= $pregonero->imagen; ?>" alt="<?= $pregonero->nombre; ?>, Pregonero/a de la Santa Cruz de la Calle Cabo <?= $ano; ?>" class="imagenAnchoTotal" loading="lazy">
                <h2><?= $pregonero->nombre; ?></h2>
            <?php if ($pregonero->imagen != "/imagenes/pregonero.webp") { ?>
            </a>
            <?php } ?>
        </div>
        <div class="dobleCelda">
            <?= $pregonero->texto; ?>
            <?php if (str_contains($pregonero->texto, "(+)")) { ?>
                <a href="/pregonero/<?= $ano; ?>" class="boton"> Más información </a>
            <?php } ?>
        </div>
    </div>

    <!-- Otros Pregoneros -->
    <?php include "../app/vistas/includes/otrosPregoneros.php"; ?>
    
    <!-- Boletines Anuarios -->
     <?php if (count($portada) > 0) { ?>
    <?php if ($portada!="none") { ?>
        <h2><?= $nombre; ?></h2>
        <?php foreach($portada as $an) { ?>
            <div class="ajuste">
                <div class="dobleCelda">
                    <img src="<?= $an->cargo; ?>" class="ancho" alt="Portada del anuario del año <?= $ano; ?>">
                    <a href="<?= $an->titulo; ?>" target="_blank" class="boton">Descargar en PDF</a>
                <br><br>

                </div>
                <div class="dobleCelda">
                    <h3><?= identificaAnuario($an->numero); ?></h3>
                    <?php $voy =0; ?>
                    <?php foreach ($boletin as $pag) { ?>
                        <?php if ($pag->numero == $an->numero && $voy<15) { ?>
                            <p>
                                <span class="tituloCaja">
                                    <?= $pag->titulo; ?>
                                </span>
                                <br>
                                <?= $pag->autor; ?>
                            </p>
                            <?php $voy++; ?>
                        <?php } ?>
                    <?php } ?>
                    ´
                    <br>
                    <?php if ($voy>=15) { ?>
                        <a href="/anuario/<?= $ano; ?>" class="boton"> Ver índice completo </a>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    <?php } }?>

    <br>
    <!-- Fotos y videos del año -->
    <?php include "../app/vistas/includes/videosRelacionados.php"; ?>
    <?php include "../app/vistas/includes/imagenesRelacionadas.php"; ?>

</div>

<?php $script = ["botonesCarrusel", "fiestas", "carruselReinas", "carruselPregoneros", "carruselVideosRelacionados", "imagenes"] ; ?>