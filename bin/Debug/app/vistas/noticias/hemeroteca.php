<div class='espaciado'></div>
<br><h1 class="tituloSeccion tituloH1">Hemeroteca: <?= $busca; ?></h1>

<div class="documento">

    <?php foreach($noticias as $noticia) { ?>
        <a href="/noticia/<?= $noticia->id; ?>">
            <p style="margin-bottom: 2px;">
                <p class="letraTitulo negrita">
                    <?= $noticia->titulo; ?>
                </p>
                
                <?= $noticia->titular; ?>
                <p class="fecha">
                    <?= dateFormat($noticia->fecha); ?>
                </p>
            </p>
        </a>
    <?php } ?>

    <br><br>
    <p class="centrado">
        <?= $indice; ?>
    </p>
</div>