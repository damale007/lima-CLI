<div class='espaciado'></div>
   <div class="contenedor-registro">
    <h1>Cambiar contraseña</h1>

    <br>
    <?php include '../app/vistas/includes/errores.php';  ?>

    <form class = "formulario" method="POST">
            
    <label for="actual">Contraseña actual</label>
        <input 
            id="actual"
            name="actual"
            class="mitad";
            type="password"
            placeholder="Contraseña actual"
            required>
        
        <label for="password">Nueva contraseña</label>
        <input 
            id="password" 
            class="mitad";
            name = "password"
            type = "password"
            required>
        
        <label for="repetir">Repite la contraseña</label>
        <input 
            id="repetir"
            name="repetir"
            class="mitad";
            type="password"
            required>    
        
        <input 
            id = "botonFormulario"
            type="submit"
            class="boton";
            value="Cambiar contraseñas">
    </form>
    <br>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php $script = "password"; ?>