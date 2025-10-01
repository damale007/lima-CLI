<div class='espaciado'></div>
<div class="contenedor-registro">
    <h1 class = "tituloSeccion tituloH1">Historial de trámites</h1>

    <?php foreach($tramites as $tramite) { 
        if ($tramite->origen == "") $tramite->origen = "Sin origen"; ?>
        <p>
            <div>
                <span class="importante">
                    <?= dateFormat($tramite->created_at); ?>

                    <?php if ($todos) echo decode($tramite->nombreU)." ".decode($tramite->apellidosU)." (".$tramite->id.")"; ?>
                    : <?= $tramite->nombreTramite; ?>
                </span>
                <span class="cursiva">
                    (<?= $tramite->origen; ?>)
                </span>
            </div>

            <?php switch ($tramite->tramite) {
                case "0": 
                    if ($tramite->tipo=="C")
                        $tipo = "Carro";
                    else 
                        $tipo = "Manola";?>

                    <?= $tipo; ?>
                     - <?= decode($tramite->nombre); ?>
                <?php 
                    break;

                case "1": ?>
                    Pujó <?= $tramite->cantidad; ?> €
                <?php 
                    break;

                case "2": ?>
                    Reservó <?= $tramite->cantidad; ?> entrada(s) para la coronación.
                <?php 
                    break;

                case "3": ?>
                    Apuntó al niño/a <?= decode($tramite->nombre); ?>
                <?php 
                    break;
                case "8": ?>
                    Pujó <?= $tramite->cantidad; ?> € por <?= $tramite->subasta; ?>
                <?php 
                    break;
                case "9": ?>
                    Apuntó a la niña <?= decode($tramite->nombre); ?>
            <?php break; } ?>
        </p>
    <?php } ?>

    <?php
        if (!isUser()) {
            if (!$todos) {
                $enlace = "/historial-all";
                $texto = "Ver trámites de todos los usuarios";
            } else {
                $enlace = "/historial";
                $texto = "Ver trámites del usuario activo";
            } ?>

            <a href="<?= $enlace; ?>" class="boton"><?= $texto; ?></a> 
        <?php } ?>
</div>

<?php 
    $title = "Historial de trámites";
    $description = "Historial de trámites realizado por el usuario."; ?>