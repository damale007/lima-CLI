<div class='espaciado'></div>
<div class="documento">
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
            <form action="/nuevoMensaje" name='formulario' method='post' class='tarjetaFormulario'> 
                <input type='hidden' name='destino' value='0'>
                <input type='hidden' name='accion' value='anade'>
                <input type='hidden' name='imagenes' id='imagenes' value="">
                <input type='hidden' name='usuario_id' value="<?= getID(); ?>">
                <input type='hidden' name='padre' value="<?= $mensaje->id; ?>">
                <textarea name="texto" id="textoMensaje" class='mensaje' placeholder='Introduce el texto del comentario' style="height: 9rem;"></textarea>

                <!-- <div id="textBox" contenteditable="true" class="mensaje"></div> -->
                
                <input type="submit" class='boton' value="Enviar" style="float: right;">
            </form>
        </p>

        <?php foreach ($comentarios as $comentario) { ?>
            <div class="tarjetaComentarios">
                <div class="usuarioComunidad">
                    <img src="<?= getImagen($comentario->idUser); ?>">
                    <div class="nombreUsuario">
                        <div class="negrita">
                            <?= descifrar($comentario->nombre); ?>
                        </div>
                        <div class="fecha">
                            <?= dateFormat($comentario->created_at); ?>
                        </div>
                    </div>
                </div>
            
                <div class="mensajeComentario">
                    <?= descifrar($comentario->texto); ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php $script = ["comunidad"]; ?>