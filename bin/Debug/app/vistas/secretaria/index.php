<div class='espaciado'></div>
<section class="documento">
    <h1 class="tituloSeccion tituloH1">Secretaría on-line</h1>
        <?php if ($registro) { ?>
            <p>
                Regístrese o logueese para tener acceso a opciones de alta o modificación de datos de hermano,<br>pago de cuota o apuntar vehículos al romerito y demás trámites.
            </p>
            <br>
            
        <?php } else { ?>

        <br>
        <div class='tarjetaNormal' style='width: 94%; margin: auto;'>
            <h3 class="titulo">Perfil de usuario</h3>
            <br>
            <p class="centrado">
                Puede acceder y modificar el perfil de su usuario a través del siguiente botón<br><br>
                <a href="/perfil" class="boton oscuro" style="display: inline-block;">Perfil de usuario</a>
            </p>
        </div>
        <br><br>

        <div class='ajuste'>
            <?php if ($tarjetaRomerito) { ?>
                <div class='tarjetaNormal'>
                    <h3 class="titulo">Romerito <?= date("Y"); ?></h3>
                    <br>
                    <p><?php if ($vehiculoRomerito < 1) { ?>
                            Puede inscribir un vehículo para el Romerito del año <?= date("Y"); ?>
                            <?php if (isDNI() != false) { ?>
                                <br><br>
                                <a href="/romerito" class="boton oscuro">Apuntar vehículo</a>
                                <?php } else { ?>
                                <p>
                                    Para poder apuntar un vehículo debe tener un DNI válido en su usuario.
                                </p>
                            <?php } ?>
                        <?php } else { ?>
                            Ya ha inscrito un vehículo para el Romerito del año <? date("Y"); ?>
                            <br><br>
                            <?php $token = base64_encode(getID().date("Ym")); ?>
                            <button id="borraRomerito" data-token="/borraRomerito?token=<?= $token; ?>" class="boton naranja">Eliminar vehículo</button>
                        <?php } ?>
                    </p>
                    
                </div>
            <?php } ?>

            <?php if ($tarjetaCoronacion) { ?>
                <div class='tarjetaNormal'>
                    <h3 class="titulo">Coronación <?= date("Y"); ?></h3>
                    <br>
                    <p>
                        Puede reservar entradas para la Coronación del año <?= date("Y"); ?>
                        <?php if (isDNI() != false) { ?>
                            <br><br>
                            <a href="/coronacion" class="boton oscuro">Reservar entradas</a>
                            <?php } else { ?>
                            <p>
                                Para poder reservar entradas debe tener un DNI válido en su usuario.
                            </p>
                        <?php } ?>
                    </p>
                    <br>
                    
                </div>
            <?php } ?>

            <?php
            if ($tarjetaPresentacion) { ?>
                <div class='tarjetaNormal'>
                    <h3 class="titulo">
                        Presentación de niños
                    </h3>
                    <br>
                    <p>
                        Puede inscribir a niños para la presentación a la Santa Cruz el primer día de Triduo,
                    </p>
                    <br>
                    <a href='/presentacion' class='boton oscuro'>Apuntar niño</a>
                </div>
            <?php } ?>


            <div class='tarjetaNormal'>
                <h3 class='titulo'>Opciones de Hermanos</h3>
                <br><br>
                <?php if (!isHermano()) { ?>
                <p>
                    <a href="/hermano?alta=nuevo" class="boton oscuro">
                        Dar de alta
                    </a>
                </p>
                <?php } ?>
                <br>

                <?php if (isHermano()) { ?>
                    <p>
                        <a href="/hermano" class="boton oscuro">
                            Modificar datos
                        </a>
                    </p>
                    <br>

                    <p>
                        <a href="/domiciliar" class="boton oscuro">
                            Domicilia cuota de hermano
                        </a>
                    </p>
                    <br>
                <?php } ?>
            </div>
        
            <div class="tarjetaNormal">
                <h3 class="titulo">Descarga documentos</h3>
                <br><br>
                <p>
                    <a href="documentos/domiciliacion.pdf" target = "_blank" class="boton oscuro">
                        Domiciliación cuota Hermano
                    </a>
                </p><br>
                
                <p>
                    <a href='documentos/alta-hermano.pdf' target = '_blank' class="boton oscuro">
                        Alta hermano
                    </a>
                </p>
                <br>
            </div>

            <div class="tarjetaNormal">
                <h3 class="titulo">Futuras Reinas</h3>
                <br><br>
                <p>
                    <a href="/apuntaReina" class="boton oscuro">
                        Apuntar niña a Reina
                    </a>
                </p>
                <br>
                <p>
                    <a href="/normasReinas" class="boton oscuro">
                        Normas transitorias apuntar Reina
                    </a>
                </p>
                <br>
            </div>
        </div>
    <?php } ?>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php $script = ["secretaria"]; ?>