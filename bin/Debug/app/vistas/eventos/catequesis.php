<div class='espaciado'></div>
  <section class="documento">
    <article>
    <h1 class="tituloSeccion tituloH1">Catequesis en la Calle Cabo</h1>
			<p>En la Capilla de la Santa Cruz de la Calle Cabo se han impartido catequesis dirigidas tanto a Hermanos y simpatizantes como al pueblo en general.</p>
      <p>Los temas a tratar son los propios del tiempo en que nos encontremos, como Adviento, Cuaresma...</p>
    </article>

    <article>
      <br><br>
    	<h2>Fecha de las últimas catequesis:</h2><br>
			<?php foreach ($catequesis as $cat) { ?>
				  	  <?= dateFormat($cat->fecha); ?>

              <?= $cat->titulo.": ".$cat->descripcion; ?>

              <br><br>
      
    			  <?php } ?>
    </article>
  </section>
</body>
</html>
