<div class='espaciado'></div>
<h1>Alta de Hermano:</h1>

<?php foreach ($alertas as $alerta) { ?>
    <?= $alerta; ?>
<?php } ?>

<?php $nuevo=true; ?>
<?php include "../app/vistas/includes/formHermano.php"; ?>

<?php $script = ["formulario"]; ?>
