   <div class='espaciado'></div>
   <div class="contenedor-registro">
    <h1><?= $titulo; ?></h1>

    <br>
    <?php include '../app/vistas/includes/errores.php';  ?>

    <form class = "formulario" method="POST">
        <input name="id" type="hidden" value="<?= $usuario->id; ?>">
            
    <label for="nombre">Nombre y apellidos</label>
        <input 
            id="nombre"
            name="nombre"
            class="mitad";
            type="text"
            value="<?= descifrar($usuario->nombre); ?>"
            placeholder="Nombre"
            required>
        
        <input 
            id="apellidos"
            name="apellidos"
            class="mitad";
            type="text"
            value='<?= descifrar($usuario->apellidos); ?>'
            placeholder="Apellidos"
            required>

        <label for="email">Email</label>
        <input 
            id="email" 
            class="tope";
            name = "email"
            value='<?= decode($usuario->email); ?>'
            type = "email"
            required>
        
        <label for="dni">DNI</label>
        <input 
            id="dni"
            name="dni"
            class="tope";
            type="text"
            value='<?= decode($usuario->dni); ?>'
            placeholder="00000000A">    
        
        <label for="cp">CP</label>
        <input 
            id="cp"
            name="cp"
            class="mitad";
            value='<?= descifrar($usuario->cp); ?>'
            type="text"
            required>

        <?php if (!isUser()) { ?>
            <label for="hermano">Hermano</label>
            <select name="hermano" id="hermano">
                <option value="N" <?php if ($usuario->hermano != 'S') echo "selected"; ?>>No</option>
                <option value="S" <?php if ($usuario->hermano == 'S') echo "selected"; ?>>Si</option>
            </select>

            <label for="is_verified">Verificado</label>
            <select name="is_verified" id="is_verified">
                <option value="0" <?php if ($usuario->is_verified == 0) echo "selected"; ?>>No</option>
                <option value="1" <?php if ($usuario->is_verified == 1) echo "selected"; ?>>Si</option>
            </select>

            <br><br>
            <label for="rol">Autoridad</label>
            <select name="rol">
                <option value="0" <?php if ($usuario->rol==0) echo "selected"; ?>>Administrador</option>
                <option value="2" <?php if ($usuario->rol==2) echo "selected"; ?>>Moderador</option>
                <option value="3" <?php if ($usuario->rol==3) echo "selected"; ?>>Secretario</option>
                <option value="4" <?php if ($usuario->rol==4) echo "selected"; ?>>Tesorero</option>
                <option value="5" <?php if ($usuario->rol==5) echo "selected"; ?>>Usuario</option>
            </select>

        <?php } ?>

        <br><br>

        <input 
            id = "botonFormulario"
            type="submit"
            class="boton";
            value="Actualizar datos">
    </form>
    <br>
    <p>NOTA: Es necesario rellenar todos los campos requeridos, y dar datos verídicos ya que se usarán en distintas partes de la web. Una vez registrado se enviará un email para activar la cuenta.</p>
    <p>Todo aquel usuario, que participando en secciones exclusivas, emplee lenguaje ofensivo o con sus mensajes y/o comentarios, insulte u ofenda a cualquier persona o grupo de personas, haga comentarios fuera del tema a tratar (política, sexo...), será penalizado con una falta leve. El acumulo de 5 faltas leves, expulsará al usuario.</p>
    <p>También se penalizará por AVATARES con imágenes de otras Hermandades, líderes o logos políticos, desnudos...</p>
    <p>Los datos que nos facilite al enviar esta solicitud de inscripción serán incorporados a un fichero propiedad de la Real, Franciscana y Fervorosa Hermandad de la Santa Cruz de la Calle Cabo, Santa Caridad y Nuestra Señora del Rosario, con domicilio en calle Comandante Herce, s/n - 21700 de La Palma del Condado, Huelva - España. La finalidad de la recogida de sus datos son las de acceso a las secciones de uso exclusivo, así como la de participarle la celebración de otros eventos y promociones futuras.</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php $script = "registro"; ?>