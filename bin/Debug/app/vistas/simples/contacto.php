<div class='espaciado'></div>
<div class="documento">
    <h1 class="tituloSeccion tituloH1"><?= $titulo; ?></h1>

    <?php if ($respuesta != "") { ?>
        <p class="alerta"><?= $respuesta; ?> </p>
    <?php } ?>
    
    <div class="contenedor-registro">
        <form id="form1" name="form1" method="post" action="/contacto" class="formulario">
            <input type="hidden" name="formulario" value="email">
            <input type="hidden" name="envio" value="<?= $email; ?>">
            <input type="hidden" value="yes" name="formulario"><br>
		    <input type='hidden' name='captcha' value='<?= $resultado; ?>' />
   	        
            <input name="nombre" type="text" size="60" required placeholder="Nombre"/><br>
    	    <input name="email" type="email" id="email" size="60" required placeholder="Email"/><br>
   		    <input name="titulo" type="text" size="60" required placeholder="Título"/><br>

            <textarea name="texto" cols="60" rows="10" placeholder="Mensaje" required></textarea><br><br>

            <?= $captcha; ?>
		    <br><br><input type='text' name='tmptxt2' placeholder='Resultado' required>
            
            <br><br>
            <button type='submit' name='button' class='boton' style='width: 400px;'>Enviar</button>
  		</form>
    <br><br>
    	<div class="centrado">
            <p>Real, Franciscana y Fervorosa Hermandad de la Santa Cruz de la Calle Cabo, Santa Caridad y Nuestra Señora del Rosario</p>

	        C/. Comandante Herce, s/n<br />
    	    21700 La Palma del Condado (Huelva)
        </div>
</div>
