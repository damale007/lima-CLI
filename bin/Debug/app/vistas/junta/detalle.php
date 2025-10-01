<div class='espaciado'></div>
<section class = "documento">
    <div class="avatarGrande">
       <img src="<?= $junta->imagen; ?>" alt = "<?= $junta->nombre; ?>" class="ancho">
    </div>

    <h1 class = "tituloSeccion tituloH1"><?= $junta->nombre; ?></h1>
    <article>
        <?php $fin = $junta->ano + 4; ?>
        
        <h2>
            <?= $junta->cargo." ".$junta->ano."-".$fin; ?>
        </h2>
        Anteriormente fue:<br>
       <?php $prim = false; ?> 
        <?php foreach ($historial as $hist) { ?>

                <?php if ($prim) echo ", "; else $prim = true; ?>
                <?= $hist->cargo; ?>
                en <?= $hist->ano; ?>
				<?php } ?>		
        <br><br><br>
      <h2>Junta de Gobierno Santa Cruz Calle Cabo <?= $junta->ano."-".$fin; ?></h2>
      <article class="ajuste">
          <?php foreach ($miembros as $m) { ?>
            <a href='/juntaDetalle/<?= $m->id; ?>'>
                <div class="cajaInvisible">
                    <div class="avatar">
                        <img src="<?=$m->imagen; ?>" alt="<?= $m->nombre; ?>" loading="lazy" class="ancho">
                    </div>
                    <p class="centrado">
                      <?= $m->cargo; ?>
                    </p>
                    <p class="centrado"> 
                      <?= $m->nombre; ?>
                    </p>
              </div>
            </a>
          <?php } ?>
      </article><br>

      <br>
      <article>
              <h2>Otras Juntas de Gobierno:</h2>
           
              <div class="ajuste">
                <?php foreach($anos as $n) { ?>
                  <a href='/verJunta?a=<?= $n->ano; ?>' class='boton'>
                    <?= $n->ano; ?>
                </a>
                <?php } ?>
              </div>
        </article>
</section>