<div class='espaciado'></div>
<section class="seccion">
    <h1 class="tituloSeccion tituloH1">Patrimonio Hermandad Santa Cruz Calle Cabo</h1>
    <article>
        <?php $ult=0; 
        $inicio = true;?>
        
        <?php foreach($patrimonio as $p) { ?>
            <?php if ($ult != $p->grupoPatrimonio_id) { ?>
                <?php if (!$inicio) echo "</div>"; $inicio=false; ?>
                <h2><?= $p->seccion; ?></h2>
                <div class='ajuste'>
            <?php } ?>
                <div class='caja'>
                    <a href='/patrimonioDetalle?id=<?= $p->id; ?>'>
                        <img src="<?= $p->imagen; ?>"><br>
                        <p class='tituloTarjeta'>
                            <?= $p->titulo; ?>
                        </p>
                        <span class='letraMini'> <?= siglos($p->ano); ?> </span>
                    </a>
                </div>
                <?php $ult = $p->grupoPatrimonio_id; ?>
        <?php } ?>
    </article>
    <br><br><br>
</section>
