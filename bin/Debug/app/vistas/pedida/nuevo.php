<div class='espaciado'></div>
<section class="documento pedida">	
    <?php include '../app/vistas/pedida/cabecera.php'; ?>

    <form action='/nuevoPedida' method='POST' class='registro'>
        <input type="hidden" name ="id" value='<?= $pedida->id; ?>'>
        <input type="hidden" name="grupo" value='<?= $grupo; ?>'>
        <input type="hidden" name="busca" value='<?= $busca; ?>'>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" maxlength="200" value='<?= trim($pedida->nombre); ?>' class='input'> 

        <label for="direccion">Direccion:</label>
        <input type="text" name="direccion" id="direccion" maxlength="200" value='<?= trim($pedida->direccion); ?>' class='input'> 

        <label for="numero">Número:</label>
        <input type="text" name="numero" id="numero" maxlength="15" value='<?= trim($pedida->numero); ?>' class='input'> 

        <label for="grupo">Grupo:</label>
        <input type="text" name="grupo" id="grupo" value='<?= trim($pedida->grupo); ?>' class='input'> 

        <input type="submit" value="Grabar" class='boton_enviar'> 
    </form>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
        $script = ["pedida"];