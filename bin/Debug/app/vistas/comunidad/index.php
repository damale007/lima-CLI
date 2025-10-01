<div class='espaciado'></div>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v21.0&appId=1231773477590077"></script>

<div class="documento">
    <h1 class="tituloSeccion tituloH1">Comunidad</h1>

    <div class="estructuraComunidad">
        <div class="columna">
            <a href="/nuevoMensaje" class="botonGrande">Escribir un mensaje</a>
            <br><br>

            <?php foreach ($mensajes as $mensaje) { ?>
                <div class="tarjetaComunidad">
                    <div class="cabeceraComunidad">
                        <div class="usuarioComunidad">
                            <img src="<?= getImagen($mensaje->idUser); ?>">
                            <div class="nombreUsuario">
                                <div class="negrita">
                                    <?= descifrar($mensaje->nombre); ?>
                                </div>
                                <div class="fecha">
                                    <?= dateFormat($mensaje->created_at); ?>
                                </div>
                            </div>
                        </div>
                        <div>
                            <img src="../imagenes/tresPuntos.png" id="<?= $mensaje->id; ?>" class="opciones" data-usr="<?= $mensaje->idUser; ?>">

                            <div id="menu<?= $mensaje->id; ?>"></div>
                        </div>    
                    </div>

                    <p>
                        <?php $imagenes = imagenesComunidad($mensaje->imagenes); ?>

                        <?= descifrar($mensaje->texto); ?>
                    </p>
                    <?php for ($i=1; $i<=count($imagenes) -1; $i++) { ?>
                        <?php if ($imagenes[$i] != "" && $imagenes[$i] != " ") { ?>
                            <img src="<?= $imagenes[$i]; ?>" loading="lazy" class="grande">
                        <?php } ?>
                    <?php } ?>

                    <p>
                        Número de comentarios: <?= numeroComentarios($comentarios, $mensaje->id); ?>
                        <a href="/mensajeComunidad?id=<?= $mensaje->id; ?>" class="boton"> Comentarios </a>
                    </p>
                </div>
            <?php } ?>
        </div>

        <div class="columna">
            <ul class="botonera">
                <li class="boton"><a href="/comunidad">Todos los mensajes</a></li>
                <li class="boton"><a href="/comunidad?t=1">Sólo imágenes</a></li>
                <li class="boton"><a href="/comunidad?t=2">Sólo públicos</a></li>
                <li class="boton"><a href="/comunidad?t=3">Sólo privados</a></li>
            </ul>

            <p class="bloqueados">
                <a href="/mensajesBloqueados"><?= $mensajes_bloqueados; ?> Mensajes bloqueados</a>
                <br>
                <a href="/mensajesBloqueados"><?= $usuarios_bloqueados; ?> Usuarios bloqueados</a>
            </p>

            <div class="fb-page" data-href="https://www.facebook.com/profile.php?id=100064382543650&amp;locale=es_ES" data-tabs="timeline" data-width="350" data-height="2000" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/profile.php?id=100064382543650&amp;locale=es_ES" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/profile.php?id=100064382543650&amp;locale=es_ES">Hdad Santa Cruz Calle Cabo</a></blockquote></div>

            <br><br>
            <div class='centrado'>
                <a href='https://www.youtube.com/callecabo' target='_Blank' class="celda"> 
                    <img src='../imagenes/youtube.webp' height='40' alt='Canal oficial de Youtube de la Hermandad' loading='lazy'>
                </a>
                <a href='https://www.facebook.com/Hdad-Santa-Cruz-Calle-Cabo-236309056838979' target='_blank' class="celda">
                    <img src='../imagenes/facebook.webp' height='40' alt='Facebook oficial de la Hermandad' loading='lazy'>
                </a>
                <a href='https://www.instagram.com/hdad.santacruz/' target='_Blank' class="celda">
                    <img src='../imagenes/instagram.webp' height='40' alt='Instagram oficial de la Hermandad' loading='lazy'>
                </a>
                <a href='http://twitter.com/#!/Callecabo' target='_blank' class="celda">
                    <img src='../imagenes/twitter.webp' height='40' alt='X oficial de la Hermandad' loading='lazy'>
                </a>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php $script = ["comunidad"]; ?>