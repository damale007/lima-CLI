<div class='espaciado'></div>
<h1 class="tituloSeccion tituloH1">Bloqueados</h1>

    <div class="estructuraComunidad">
        <div class="columna">
            <h2>Mensajes bloqueados</h2>
            <?php foreach ($mensajes as $mensaje) { ?>
                <div class="tarjetaComunidad">
                    <div class="cabeceraComunidad">
                        <div class="usuarioComunidad">
                            <img src="<?= getImagen($mensaje->idUser); ?>">
                            <div class="nombreUsuario">
                                <div class="negrita">
                                    <?= decode($mensaje->nombre); ?>
                                </div>
                                <div class="fecha">
                                    <?= dateFormat($mensaje->created_at); ?>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button id="<?= $mensaje->id; ?>"  data-usr="<?= $mensaje->idUser; ?>" data-tipo="M" class="boton">Volver a mostrar</button>

                            <div id="menu<?= $mensaje->id; ?>"></div>
                        </div>    
                    </div>

                    <p>
                        <?php $msg = mensajeComunidad($mensaje->texto); ?>

                        <?= $msg[0]; ?>
                    </p>
                    <?php for ($i=1; $i<=count($msg) -1; $i++) { ?>
                        <?php if ($msg[$i]!="" && $msg[$i]!=" ") { ?>
                            <img src="<?= $msg[$i]; ?>" loading="lazy" class="grande">
                        <?php } ?>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>

        <div class="columna">
            <h2>Usuarios bloqueados</h2>
            <?php foreach($usuarios as $usuario) { ?>
                <br>
                <div class="centrado">
                    <img src="<?= getImagen($usuario->id); ?>" loading="lazy" class="avatar">
                    <p>
                        <?= decode($usuario->nombre); ?>
                    </p>
                    <p class="centrado">
                        <button id="<?= $usuario->idUser; ?>"  data-usr="<?= $_SESSION['id']; ?>" data-tipo="U" class="boton">Desbloquear</button>
                    </p>
                </div>
            <?php } ?>                
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php $script=['bloqueo']; ?>