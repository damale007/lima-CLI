<div class='espaciado'></div>
<h1>Editar Hermano:</h1>
<p class='identificador'>
    Antigüedad: <?= $hermano->antiguedad; ?>
    - Id de hermano <?= $hermano->id; ?>
    - 
    <?php $estado = ["Baja", "Hermano", "Fallecido", "Fallecido pero sigue pagando"]; ?>
    <?= $estado[$hermano->estado]; ?>
</p>

<?php $nuevo = false; ?>
<?php include "../app/vistas/includes/formHermano.php"; ?>

<h2><br>Historial<br></h2>
<div class='ficha'>
<?php if (isSecretario()) echo '<a href="/nuevoHistorial?i='.$hermano->id.'"><button class="boton verde">Añadir Historial</button></a> <br><br><br>'; ?>

    <?php if (empty($historial)) echo "No hay nada en el historial"; else {?>
        <table>
            <tr>
                <th class='titulo_tabla'>Fecha</th>
                <th class='titulo_tabla'>Evento</th>
                <th class='titulo_tabla'>Descripción</th>
                <th class='titulo_tabla'>Acciones</th>
            </tr>
            <?php $tipo = ["Baja", "Alta", "Fallecido", "Fallecido pero sigue pagando", "Junta de Gobierno", "Reina", "Dama", "Pregonero", "Presentador pregón", "Cartelista", "Hecho destacado", "Subida Cruz", "Farol triduo"]; ?>
            
            <?php foreach($historial as $linea) { ?>
                <tr>
                    <td>
                        <?php if (isSecretario()) echo "<a href='/editaHistorial?i=".$linea->id."'>"; ?>
                        <?= dateFormat($linea->fecha); ?>
                        <?php if (isSecretario()) echo "</a>"; ?>
                    </td>

                    <td>
                        <?php if (isSecretario()) echo "<a href='/editaHistorial?i=".$linea->id."'>"; ?>
                        <?= $tipo[$linea->tipo]; ?>
                        <?php if (isSecretario()) echo "</a>"; ?>
                    </td>
                    
                    <td>
                        <?php if (isSecretario()) echo "<a href='/editaHistorial?i=".$linea->id."'>"; ?>
                        <?= $linea->descripcion; ?>
                        <?php if (isSecretario()) echo "</a>"; ?>
                    </td>
                    <td>
                        <?php if (isSecretario()) echo '<td><p id="'.$linea->id.'" data-tipo = "historial" class="botonAccion">Borrar</p></td>'; ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>
    </div>

    <br>

    <h2><br>Pagos<br></h2>
<div class='ficha'>
    <?php if (isTesorero()) echo '<a href="/nuevoPago?i='.$hermano->id.'"><button class="boton verde">Añadir Pago</button></a> <br><br><br>'; ?>

    <?php if (!empty($estadoPago)) {?>
    <?php foreach($estadoPago as $linea) { ?>
        <?= $linea."<br>"; ?>
    <?php } } ?>
    <br>
    <?php if (empty($pagos)) echo "No hay nada en el historial de pagos"; else {?>
        <table>
            <tr>
                <th class='titulo_tabla'>Fecha</th>
                <th class='titulo_tabla'>Evento</th>
                <th class='titulo_tabla'>Descripción</th>
                <?php if (isTesorero()) echo '<th class="titulo_tabla">Acciones</th>'; ?>
            </tr>
            <?php $tipo = ["No paga el año...", "Paga año atrasado", "Pagado hasta el año...", "Pago de año perdonado", "Exento de pago"]; ?>
            
            <?php foreach($pagos as $linea) { ?>
                <tr>
                    <td>
                        <?php if (isSecretario()) echo "<a href='/editaHistorial?i=".$linea->id."'>"; ?>
                        <?= dateFormat($linea->fecha); ?>
                        <?php if (isSecretario()) echo "</a>"; ?>
                    </td>

                    <td>
                        <?php if (isSecretario()) echo "<a href='/editaHistorial?i=".$linea->id."'>"; ?>
                        <?= $tipo[$linea->tipo]; ?>
                        <?php if (isSecretario()) echo "</a>"; ?>
                    </td>
                    
                    <td>
                        <?php if (isSecretario()) echo "<a href='/editaHistorial?i=".$linea->id."'>"; ?>
                        <?= $linea->descripcion; ?>
                        <?php if (isSecretario()) echo "</a>"; ?>
                    </td>

                    <?php if (isTesorero()) echo '<td><p id="'.$linea->id.'" data-tipo = "pago" class="botonAccion">Borrar</p></td>'; ?>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>
    </div>
    <br>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php $script=["decodeForm", "formulario", "acciones"]; ?>