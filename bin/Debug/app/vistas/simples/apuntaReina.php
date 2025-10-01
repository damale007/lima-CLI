<div class='espaciado'></div>
<section class="documento">
    <h1 class="tituloSeccion tituloH1">Apuntar Niña a Reina</h1>

    <br>
    <?php include '../app/vistas/includes/errores.php';  ?>
    <br>

    <form method="POST" class='formulario'>
        <label for="ano">Año para ser Reina</label>
        <input type="number" name="ano" id="ano" value="<?= $datos['ano'] ?>" required>
        
        <label for="nombreReina">Nombre completo de la niña</label>
        <input type="text" name="nombreReina" id="nombreReina" class="tope" value="<?= $datos['nombre']; ?>" required>

        <hr>
        <p>Datos del padre/madre/tutor/a</p>

        <label for="nombrePadre">Nombre completo</label>
        <input type="text" name="nombrePadre" id="nombrePadre" class="tope" value="<?= $datos['nombrePadre']; ?>" required>

        <label for="dni">DNI</label>
        <input type="text" name="dni" id="dni" value="<?= $datos['dni']; ?>"required>

        <label for="email">Email</label>
        <input type="text" name="email" id="email" class="tope" value="<?= $datos['email']; ?>" required>

        <label for="telefono">Teléfono</label>
        <input type="text" name="telefono" id="telefono" value="<?= $datos['telefono']; ?>" required>

        <br><br>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required>

        <br><br>
        <input type="submit" value="Apuntar" class='boton'>
    </form>
</section>

<?php 
    $title = "Apuntar a Reina Calle Cabo";
    $description = "Apunta a una niña a Reina de las Fiestas en Honor a la Santa Cruz de la Calle Cabo"; 