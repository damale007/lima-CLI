<div class='espaciado'></div>
  <section class = "documento">
        <h1>Junta de Gobierno <?= $ano; ?>-<?php $ano2=$ano+4; echo $ano2;?>:</h1><br>
              
        <article class='ajuste'>
            <?php foreach ($junta as $m) { ?>
                <a href='/juntaDetalle?id=<?= $m->id; ?>'>
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
        </article>
          
        <br>
  </section>
        <article class="devocion">
              <h2>Otras Juntas de Gobierno:</h2>
           
              <div class="ajuste">
                <?php foreach($anos as $n) { ?>
                  <a href='/verJunta?a=<?= $n->ano; ?>' class='boton'>
                    <?= $n->ano; ?>
                </a>
                <?php } ?>
              </div>
        </article>