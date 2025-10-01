   <div class='espaciado'></div>
   <div class="contenedor-registro">
    <h1 class = "tituloSeccion tituloH1"><?= $titulo; ?></h1>

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
        
        <label for="cp">CP</label>
        <input 
            id="cp"
            name="cp"
            class="mitad";
            value='<?= descifrar($usuario->cp); ?>'
            type="text"
            required>

        <label for="direccion">Dirección</label>
        <input 
            id="direccion"
            name="direccion"
            class="tope"
            type="text"
            required>

        <label for="poblacion">Población</label>
        <input 
            id="poblacion"
            name="poblacion"
            class="tope"
            type="text"
            required>

        <label for="provincia">Provincia</label>
        <select
            id="provincia"
            name="provincia"
            class="mitad">
            <option value='Albacete'>Albacete</option>
            <option value='Alicante'>Alicante</option>
            <option value='Almería'>Almería</option>
            <option value='Álava'>Álava</option>
            <option value='Asturias'>Asturias</option>
            <option value='Ávila'>Ávila</option>
            <option value='Badajoz'>Badajoz</option>
            <option value='Barcelona'>Barcelona</option>
            <option value='Burgos'>Burgos</option>
            <option value='Cáceres'>Cáceres</option>
            <option value='Cádiz'>Cádiz</option>
            <option value='Cantabria'>Cantabria</option>
            <option value='Castellón'>Castellón</option>
            <option value='Ceuta'>Ceuta</option>
            <option value='Ciudad Real'>Ciudad Real</option>
            <option value='Córdoba'>Córdoba</option>
            <option value='Coruña, La'>Coruña, La</option>
            <option value='Cuenca'>Cuenca</option>
            <option value='Gipúzcoa'>Gipúzcoa</option>
            <option value='Gerona'>Gerona</option>
            <option value='Granada'>Granada</option>
            <option value='Guadalajara'>Guadalajara</option>
            <option value='Huelva'>Huelva</option>
            <option value='Huesca'>Huesca</option>
            <option value='Islas Baleares'>Islas Baleares</option>
            <option value='Jaén'>Jaén</option>
            <option value='León'>León</option>
            <option value='Lérida'>Lérida</option>
            <option value='Lugo'>Lugo</option>
            <option value='Madrid'>Madrid</option>
            <option value='Málaga'>Málaga</option>
            <option value='Melilla'>Melilla</option>
            <option value='Murcia'>Murcia</option>
            <option value='Navarra'>Navarra</option>
            <option value='Orense'>Orense</option>
            <option value='Palencia'>Palencia</option>
            <option value='Palmas, Las'>Palmas, Las</option>
            <option value='Pontevedra'>Pontevedra</option>
            <option value='Rioja, La'>Rioja, La</option>
            <option value='Salamanca'>Salamanca</option>
            <option value='Santa Cruz de Tenerife'>Santa Cruz de Tenerife</option>
            <option value='Segovia'>Segovia</option>
            <option value='Sevilla'>Sevilla</option>
            <option value='Soria'>Soria</option>
            <option value='Tarragona'>Tarragona</option>
            <option value='Teruel'>Teruel</option>
            <option value='Toledo'>Toledo</option>
            <option value='Valencia'>Valencia</option>
            <option value='Valladolid'>Valladolid</option>
            <option value='Vizcaya'>Vizcaya</option>
            <option value='Zamora'>Zamora</option>
            <option value='Zaragoza'>Zaragoza</option>
        </select>


        <label for="fecha">Fecha de Nacimiento</label>
        <input 
            id="fecha"
            name="fecha"
            class="mitad"
            type="date"
            required>

        <label for="dni">DNI</label>
        <input 
            id="dni"
            name="dni"
            class="mitad";
            type="text"
            value='<?= decode($usuario->dni); ?>'
            placeholder="00000000A">  

        <label for="email">Email</label>
        <input 
            id="email" 
            class="tope";
            name = "email"
            value='<?= decode($usuario->email); ?>'
            type = "email"
            required>

        <label for="telefono">Teléfono</label>
        <input 
            id="telefono"
            name="telefono"
            class="mitad"
            type="text"
            required>

        <br><br>

        <input 
            id = "botonFormulario"
            type="submit"
            class="boton";
            value="<?= $boton; ?>">
    </form>
    <br>
    <p>
        En el título II de las Reglas de la Hermandad se tratan todos los derechos y deberes de los Hermanos, para ver las reglas, <a href="/reglas">pulse aquí.</a>
    </p>
</div>