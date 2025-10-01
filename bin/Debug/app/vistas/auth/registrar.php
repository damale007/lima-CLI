<div class='espaciado'></div>
   <div class="contenedor-registro">
    <h1>Crea tu cuenta de usuario</h1>
    <p class="letraMini">Es rápido y fácil</p>

    <br>
    <?php include '../app/vistas/includes/errores.php';  ?>
    
    <form class = "formulario" method="POST">
            
    <label for="nombre">Nombre y apellidos</label>
        <input 
            id="nombre"
            name="nombre"
            class="mitad";
            type="text"
            value="<?= $usuario->nombre; ?>"
            placeholder="Nombre"
            required>
        
        <input 
            id="apellidos"
            name="apellidos"
            class="mitad";
            type="text"
            value='<?= $usuario->apellidos; ?>'
            placeholder="Apellidos"
            required>

        <label for="email">Email</label>
        <input 
            id="email" 
            class="tope";
            name = "email"
            value='<?= $usuario->email; ?>'
            type = "email"
            required>
        
        <label for="password">Contraseña</label>
        <input 
            id="password"
            name="password"
            class="tope";
            type="password"
            placeholder="Mínimo 6 caracteres"
            required>
        
        <label for="password2">Repita la contraseña</label>
        <input 
            id="password2"
            name="password2"
            class="tope";
            type="password"
            required>

        <label for="dni">DNI</label>
        <input 
            id="dni"
            name="dni"
            class="tope";
            type="text"
            value='<?= $usuario->dni; ?>'
            placeholder="00000000A">    
        
        <label for="cp">CP</label>
        <input 
            id="cp"
            name="cp"
            class="tope";
            value='<?= $usuario->cp; ?>'
            type="text"
            required>

        <br><br>
        <p class="letraMini">Al hacer clic en "Registrarse", aceptas las Condiciones y confirmas que has leído nuestra Política de datos, incluido el Uso de cookies</p>
        <input 
            id = "botonFormulario"
            type="submit"
            class="boton";
            value="Registrarse">
    </form>
    <br>
    <p>NOTA: Es necesario rellenar todos los campos requeridos, y dar datos verídicos ya que se usarán en distintas partes de la web. Una vez registrado se enviará un email para activar la cuenta.</p>
    <p>Todo aquel usuario, que participando en secciones exclusivas, emplee lenguaje ofensivo o con sus mensajes y/o comentarios, insulte u ofenda a cualquier persona o grupo de personas, haga comentarios fuera del tema a tratar (política, sexo...), será penalizado con una falta leve. El acumulo de 5 faltas leves, expulsará al usuario.</p>
    <p>También se penalizará por AVATARES con imágenes de otras Hermandades, líderes o logos políticos, desnudos...</p>
    <p>Los datos que nos facilite al enviar esta solicitud de inscripción serán incorporados a un fichero propiedad de la Fervorosa Hermandad de la Santa Cruz, Santa Caridad y Nuestra Señora del Rosario (Calle Cabo), con domicilio en calle Comandante Herce, s/n - 21700 de La Palma del Condado, Huelva - España. La finalidad de la recogida de sus datos son las de acceso a las secciones de uso exclusivo, así como la de participarle la celebración de otros eventos y promociones futuras.</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php $script = "registro"; ?>