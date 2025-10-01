<div class='filtrado'>
    <div>
        <label for="estado">Estado</label>
        <select id="estado">
            <option value="-1">Todos</option>
            <option value="0">Baja</option>
            <option value="1">Hermano</option>
            <option value="2">Fallecido</option>
            <option value="3">Fallecido siguie pagando</option>
        </select>
    </div>

    <div>
        <label for="nombre">Nombre</label>
        <input id="nombre" type="text">
    </div>

    <div>
        <label for="direccion">Direccion</label>
        <input id="direccion" type="text">
    </div>

    <div>
        <label for="poblacion">Población</label>
        <input id="poblacion" type="text">
    </div>

    <div>
        <label for="sexo">Sexo</label>
        <select id="sexo">
            <option value="-1">Todos</option>
            <option value="0">Hombre</option>
            <option value="1">Mujer</option>
        </select>
    </div>

    <div>
        <label for="edad">Mayor de X en:</label>
        <input type="number" id="edad">
        <input type="date" id="fecha">
    </div>
</div>

<div id="barra-estado"></div>

<?php if (!empty($caducan)) { ?>
    <div class='alerta'>
        <strong>Caducan el pago este año:</strong><br><br>
        <?php foreach($caducan as $caduca) { ?>
            <?= $caduca."<br>"; ?>
        <?php } ?>
    </div>
<?php } ?>

<div class='ficha'>
    <table id="tabla">
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php $script=["funciones", "listado"]; ?>