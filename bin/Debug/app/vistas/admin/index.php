<div class='espaciado'></div>
<br><br>
<div class="contenedor-admin">
    <aside>
        <?php include "menu.php"; ?>
    </aside>

    <main>
        <h1>Modo administrador</h1>
        <form action="versionapp.php" method="post" name="versionapp" id="versionapp">
			Versión de CaboApp: <input type="text" name="version" value="<?= $version; ?>">
			<input type="submit">
		</form><br><br>

        <article>
            <h2>Listados apuntados por App/web</h2><hr>
            <div class="grupo-menu">
                <a href="/listado-historial?t=1">Pujas</a>
                <a href="/listado-historial?t=3">Presentación niños</a>
                <a href="/listado-historial?t=0">vehículos Romerito</a>
                <a href="/listado-historial?t=2">Reservas Coronación</a>
                <a href="/listado-historial?t=8">Subastas</a>
            </div>
        </article>

        <br><br>
        <article>
            <h2>Configuración</h2><hr>
            <div class="grupo-menu">
                <a href="efemerides.php">Efemérides</a>
                <a href="sitemap/sitemap.php">Sitemap</a>
            </div>
        </article>

        <br><br>
        <form action="/Admin/sorteos" method="post" name="formopc" id="formopc">
            <label for="coronacion">Día sorteo de Coronación:</label>
            <input id="coronacion" type="text" name="coronacion" value="<?= $sorteos[0]; ?>" /><br>


            <label for="romerito">Día sorteo Romerito:</label>
            <input id="romerito" type="text" name="romerito" value="<?= $sorteos[1]; ?>" /><br> 

            <label for="antelacion">Dias de antelación de aviso:</label>
            <input id="antelacion" type="text" name="antelacion" value="<?= $sorteos[2]; ?>" /><br> 
            
            <label for="feria">Día inicio Feria:</label>
            <input id="feria" type="text" name="feria" value="<?= $sorteos[3]; ?>" /><br> 
            
            <label for="habas">Día Habas:</label>
            <input id="habas" type="text" name="habas" value="<?= $sorteos[4]; ?>" /> 

            <label for="mesHabas">Mes habas:</label>
            <input id="mesHabas" type="text" name="mesHabas" value="<?= $sorteos[5]; ?>" /><br> 
            
            Hora Rosario Capilla: <input type="text" name="rosario" value="<?= $sorteos[6]; ?>" /><br> 
            <input type="submit" class="boton" value="Actualiza" />
        </form><br><br>

    </main>
</div>