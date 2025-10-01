<div class='espaciado'></div>
<br><br>
<div class="contenedor-admin">
    <aside>
        <?php include "menu.php"; ?>
    </aside>

    <main>
        <div class="contenedor-registro">
            <h1>Editor de noticias</h1>

            <?php foreach ($alertas as $alerta) { ?>
				<p><?= $alerta; ?></p>
			<?php } ?>

            <br>
            <?php // include '../appvistas/includes/errores.php';  ?> 

            <form class = "formulario" method="POST" enctype="multipart/form-data">
                    
                <label for="file">Subir imagen:</label>
                <input id="file" name="file" type="file" accept=".jpg,image/jpeg"/>

                <input name="id" type="hidden" value="<?= $noticia->id; ?>">
                <label for="imagen">Nombre Imagen (SIN extensión)</label>
                <input id="nombreImagen"
                    name="nombreImagen"
                    class="tope"
                    type="text"
                    value="<?= $noticia->imagen; ?>"
                    placeholder="Nombre">
                    
                <label for="fecha">Fecha</label>
                <input 
                    id="fecha"
                    name="fecha"
                    class="mitad";
                    type="date"
                    value='<?= $noticia->fecha; ?>'
                    placeholder="Apellidos"
                    required>

                <label for="titulo">Título</label>
                    <input 
                        id="titulo" 
                        class="tope";
                        name = "titulo"
                        value='<?= $noticia->titulo; ?>'
                        type = "text"
                        required>
                    
                    <label for="titular">Titulares</label>
                    <input 
                        id="titular"
                        name="titular"
                        class="tope";
                        type="text"
                        value='<?= $noticia->titular; ?>'
                        required>    
                    
                    <label for="texto">Texto de la noticia</label>
                    <textarea 
                        id="texto"
                        name="texto"
                        class="tope";
                    >
                        <?= $noticia->texto; ?>
                    </textarea>

                    <label for="tags">Tags</label>
                    <input 
                        id="tags"
                        name="tags"
                        class="mitad";
                        value='<?= $noticia->tags; ?>'
                        type="text"
                        required>

                    <label for="localizacion">Localización</label>
                    <select name="localizacion">
                        <option value="">Ninguno</option>
                        <option value="https://maps.app.goo.gl/F2iHqcwbJMaXueS69">Capilla</option>
                        <option value="https://maps.app.goo.gl/qjKAzSb7uYbjGcWDA">Secretaría</option>
                        <option value="https://maps.app.goo.gl/EAqwi8yK481617hZ6">Sala de Tesoro</option>
                        <option value="https://maps.app.goo.gl/cmscQWBiKvBycTSA9">Iglesia</option>
                        <option value="https://maps.app.goo.gl/QZZtbcW8LBZSfnvd7">Teatro</option>
                        <option value="https://maps.app.goo.gl/GWvhH4njQ7gqZqQk7">Casino</option>
                        <option value="https://maps.app.goo.gl/RvLBY1ZjyiJ1mP1f6">Peto</option>
                        <option value="https://maps.app.goo.gl/VcvaX9mCoj7uZtuo8">4 esquinas</option>
                        <option value="https://maps.app.goo.gl/VcvaX9mCoj7uZtuo8">Sitio de la paella</option>
                        <option value="https://maps.app.goo.gl/iYzgb79cELudrzQc8">Campo de tiro</option>
                        <option value="https://maps.app.goo.gl/Dvd37wRMPBVpdBfD9">Feria</option>
                        <option value="https://maps.app.goo.gl/wbKBvqRYCoouqjLD7">Casa de Gertrudis</option>
                        <option value="https://maps.app.goo.gl/oDToBzhRhi4fX92k6">Plaza de España</option>
                        <option value="https://maps.app.goo.gl/xwAdngq8nt4V9Tdu7">Polideportivo</option>
                        <option value="https://maps.app.goo.gl/2RQoFeLNjVMEzktb6">Nave de las carrozas</option>
                        <option value="https://maps.app.goo.gl/D9k1tNPL8kKpsM4A9">Ayuntamiento</option>
                    </select>

                    <input 
                        name="localizacion2"
                        class="tope";
                        value='<?= $noticia->localizacion; ?>'
                        type="text">

                    <label for="tema">Tema:</label>
                    <select name="grupoNoticiasId" id="tema">
                        <?php foreach ($temas as $tema) { ?>
                            <option value="<?= $tema->id; ?>"
                                <?php if ($noticia->id != -1 && $tema->id == $noticia->grupoNoticiasId) echo "selected"?>>
                                <?= $tema->titulo; ?>
                            </option>
                        <?php } ?>
                    </select>

                    <select name="historico" class="mitad">
                        <option value="0" 
                            <?php if ($noticia->id != -1 && $noticia->historico=="0") echo "selected='selected'"; ?> >
                                Noticia normal
                        </option>
                        
                        <option value="1" 
                            <?php if ($noticia->id != -1 && $noticia->historico =="1") echo "selected='selected'"; ?> >
                                Noticia Histórica
                        </option>
                    </select>

                    <br><br>
                    <label for="fecha_caducidad">Fecha de caducidad</label>
                    <input 
                        id = "fecha_caducidad"
                        name = "fecha_caducidad"
                        type="date"
                        class="mitad";
                        value="<?= $noticia->fecha_caducidad; ?>"> Dejar en blanco SIN caducidad

                    <label for="hermano">Exclusiva hermano</label>
                    <select id="hermano" name="hermano" class="mitad">
                        <option value="0" 
                            <?php if ($noticia->id != -1 && $noticia->hermano=="0") echo "selected='selected'"; ?> >
                                NO
                        </option>
                        <br>
                        
                        <option value="S" 
                            <?php if ($noticia->id != -1 && $noticia->hermano =="S") echo "selected='selected'"; ?> >
                                SI
                        </option>
                    </select>

                    <select name="publicada" class="mitad">
                        <option value="S" 
                            <?php if ($noticia->id != -1 && $noticia->publicada=="S") echo "selected='selected'"; ?> >
                                Publicar inmediatamente
                        </option>
                        
                        <option value="N" 
                            <?php if ($noticia->id != -1 && $noticia->publicada =="N") echo "selected='selected'"; ?> >
                                No publicar de momento
                        </option>
                    </select>

                    <input 
                        type = "submit"
                        class="boton"
                        value="Enviar" >
            </form>
            <br>

            <?php foreach($noticias as $noticia) { ?>
                <p>
                    <a href="/admin/noticias?id=<?= $noticia->id; ?>">
                        <?= $noticia->fecha." - ".$noticia->titulo; ?>
                    </a>
                </p>
            <?php } ?>

            <br><br>
            <?php if (!$total) { ?>
                <a href="/admin/noticias?t=1">Ver todas las noticias</a>
            <?php } ?>
        </div>

    </main>
<?php $ruta = "../"; $script = ["fichero"]; ?>
