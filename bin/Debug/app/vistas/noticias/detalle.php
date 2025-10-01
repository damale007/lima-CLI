<div class='espaciado'></div>
<div class="seccionNoticias">
    <h1 class="tituloSeccion tituloH1"> <?= $noticia->titulo; ?> </h1>

    <h2><?= $noticia->titular; ?> </h2>

    <p class="centrado">
        <img src="<?= $noticia->imagen; ?>" alt="<?= $noticia->titulo; ?>" class="imagenPrincipal">
    </p>

    <div class="estructuraNoticias">
        <main>
            <p class="fecha"><?= dateFormat($noticia->fecha); ?></p>
		    <p>
                <a href="http://www.facebook.com/sharer.php?u=https://www.callecabo.com/actualidad/pon_noticia.php?id=<?= $noticia->id; ?>" title="Facebook" target="_blank" rel="nofollow">
			    <img src="../imagenes/facebook.webp" height="30"> </a>
					
			    <a href="http://twitter.com/intent/tweet?text=https://www.callecabo.com/actualidad/pon_noticia.php?id=<?= $noticia->id; ?>" title="Twitter" target="_blank" rel="nofollow">
			    &nbsp&nbsp<img src="../imagenes/twitter.webp" height="30"> </a>
            </p>
            
            <br>
            <?= $noticia->texto; ?>
            <br><br>
            <?php include "../app/vistas/includes/comentarios.php"; ?>
        </main>

        <aside>
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				   <!-- principal -->
				   <ins class="adsbygoogle"
						style="display:block"
						data-ad-client="ca-pub-9167656526748449"
						data-ad-slot="5900776674"
						data-ad-format="auto"
						data-full-width-responsive="true"></ins>
				   <script>
						(adsbygoogle = window.adsbygoogle || []).push({});
				   </script>

            <p>Noticias relacionadas</p>

            <?php foreach($relacionadas as $relacionada) { ?>
                <a href="/noticia/<?= $relacionada->id; ?> ">
                    <p class="tituloRelacionada"><?= $relacionada->titulo; ?><p>
                    <p class="titularRelacionado"><?= $relacionada->titular; ?></p>
                    <p class="fecha"><?= dateFormat($relacionada->fecha); ?></p>
                </a>
                <br>
            <?php } ?>
        </aside>
    </div>
</div>

<?php 
    $title = $noticia->titulo;
    $description = $noticia->titular; ?>