<br>
<!-- FORMULARIO NUEVO COMENTARIO  -->
<?php if (isLogin()) { ?>
    <h2>Comentarios:</h2>

    <div class = "contenedorComentarios">
        <img src="<?= getImagen(); ?>" class="imagenUsuarioComentarios">
        <form action="/comentarios/nuevo" method="POST">
            <input type="hidden" name="id_usuario" value="<?= getId(); ?>">

            <?php if (isset($noticia)) { ?>
                <input type="hidden" name="id_noticia" value="<?= $noticia->id; ?>">
            <?php } ?>

            <?php if (isset($video)) { ?>
                <input type="hidden" name="id_video" value="<?= $video[0]->id; ?>">
            <?php } ?>

            <input type="text" name="texto" placeholder="Añade un comentario" required>
            <input type="submit" value = "Enviar">
        </form>
    </div>

<?php } ?>

<br><hr><br>
<!-- LISTADO DE COMENTARIO  -->
<?php 
    if (count($comentarios)>0) {
        foreach($comentarios as $comentario) {?>
            <div class="contenedorComentarios">
                <img src="<?= getImagen($comentario->id_usuario); ?>" class="imagenUsuarioComentarios">
                <div class="cuerpoComentario">
                    <span class="usuarioComentario">
                        <?= descifrar($comentario->nombre)." ".descifrar($comentario->apellidos); ?>.- 
                    </span>
                    <?= descifrar($comentario->texto); ?>
                    <p class="fecha">
                        <?= dateFormat($comentario->created_at); ?>
                    </p>
                </div>
            </div>
        <?php }
    }
?>
