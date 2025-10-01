<div class='espaciado'></div>
   <div class="contenedor">
        <img src="imagenes/capilla.webp" class="imagen-login">

        <div id="paso-1" class='formulario-login'>
            <h1>Identifícate</h1>

           <?php include '../app/vistas/includes/errores.php'; ?>

            <form method="POST" class="formulario">
                <?php createFormToken(); ?>
                <label for="email">Email</label>
                <input 
                    id="email" 
                    name = "email"
                    type = "email"
                    class = "tope"
                    required>
                
                    <label for="password">Contraseña</label>
                <input 
                    id="password" 
                    name = "password"
                    type = "password"
                    class = "tope"
                    required>

                <input 
                    type = "submit"
                    class = "boton"
                    value = "Identificarse">
            </form>
            
            <br><br>
            <a href='/olvido' class="letraMini">¿Olvidó su contraseña?</a><br><br>
            <a href='/registrar' class="letraMini">¿Aún no tiene una cuenta?, cree una</a>
        </div>
    </div>
