<div class="video">
	<div class="overlay">
        <img src="/imagenes/misas.webp" alt="pMisa en la capilla de la Santa Cruz de la Calle Cabo" class="imagenAnchoTotal">
        <h1 class="textoTituloSangre">Misas en la Capilla de la<br>Santa Cruz Calle Cabo</h1>
    </div>
</div>

<section class="documento">
    <p>La Capìlla de la Santa Cruz de la Calle Cabo, suele celebrar Eucarsitía al menos una vez al mes. Las reglas de la Hermandad de la Santa Cruz de la Calle Cabo, establece las siguientes misas:</p>
    <p>3 De mayo, misa en la Festividad de la Invención de la Santa Cruz.<br>
    14 De septiembre, festividad de la Exaltación de la Santa Cruz. <a href="exaltacion.php">Ver más</a><br>
    4 De octubre , destividad de San Francisco de Asís, por el vínculo contraido con la Orden Franciscana.</br>
    7 De octubre, Festividad de Ntra. Sra. del Rosario. <a href="rosario.php">Ver más</a></p>
    <p>El Grupo Joven de la Hermandad también suele celebrar misa el 16 de julio, festividad de Ntra. Sra. del Carmen (Protectora del Grupo Joven).</p>
    <br><br>
    Esta Hermandad tiene establecido los cultos en sus reglas en el artículo 81: <br><br>
        <a href="/reglas" class="boton">Reglas de la Hermandad</a>

    <h2>Misas en la Capilla de este año:</h2>

    <?php foreach ($misas as $misa) { ?>
        <p class="centrado"><?= dateFormat($misa->fecha)." - ".$misa->titulo; ?> </p>
    <?php } ?>
        <br><br>
        <?php include "../app/vistas/includes/noticiasRelacionadas.php"; ?>
</section>