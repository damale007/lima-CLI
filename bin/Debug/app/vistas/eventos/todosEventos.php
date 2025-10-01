<div class='espaciado'></div>
<div class="documento">
    <h1 class = "tituloSeccion tituloH1">Eventos del año <?= $ano; ?></h1>

    <?php foreach ($eventos as $evento) { ?>
        <a href='/evento?i=<?= $evento->id_grupo; ?>'>
            <h3><?= $evento->titulo; ?></h3>
        </a>
        
        <?= dateFormat($evento->fecha); ?>
        <br><br>
    <?php } ?>

</div>