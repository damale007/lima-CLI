<script>
	function act_bingo(par_id, par_nombre, par_direccion, grupo)
	{
	    document.formu_bingo.id.value=par_id;
	    document.formu_bingo.nombre.value=par_nombre;
	    document.formu_bingo.direccion.value=par_direccion;
	    document.formu_bingo.grupo.value=grupo;
        location.href="/bingo#formulario";
	    <?php /*
	        if ($bingo>0) echo 'location.href="bingo.php?b='.$bingo.'#formulario";'; else echo 'location.href="bingo.php#formulario";
	    '; */?>
	}
</script>



<div class='espaciado'></div>
<section class="documento">	
		<h1 class="tituloSeccion tituloH1">Listado de Bingos</h1>
		<br><br><a href="#formulario" class="boton2">Modificar cartón manualmente</a> | <a href="#grupos" class="boton2">Ir a resumen por grupos</a> 
		-------- Ir al cartón: <a href="#250" class="boton2"> 250 </a>|<a href="#500" class="boton2"> 500 </a>|
		<a href="#750" class="boton2"> 750 </a>|<a href="#1000" class="boton2"> 1000 </a><br /><br />
	
	</article>
	
	<article>
		<h2>Listado de nombres y direcciones</h2>
		<br><br><br>
        <table>
            <tr>
        		<?php $lateral = 0; ?>

                <?php foreach($bingos as $bingo) { ?>
					<td width='25%'>
                        <table>
                            <tr>
                                <td bgcolor="#00CC00">
                                    <?php if ($bingo->id == 250 || $bingo->id ==500 || $bingo->id == 750 || $bingo->id == 1000) { ?>
                                        <a name='<?= $bingo->id; ?>'>
                                            <?= $bingo->id; ?> 
                                        </a>
                                    <?php } else echo " ".$bingo->id." "; $suma=0;?> 
                                </td>
                                <td>
                                    <a href='javascript:act_bingo("<?= $bingo->id; ?>","<?= $bingo->nombre; ?>","<?= $bingo->direccion; ?>","<?= $bingo->grupo; ?>");'>

                                    <?php if (trim($bingo->nombre) =="") { ?>
                                            Cartón no vendido.
                                    <?php } else { ?>
                	    				<?= $bingo->nombre; ?>
                                        <br>
                                        <?= $bingo->direccion;?>
                                         (<?= $bingo->grupo; ?>) 
                                        <?php } ?> 
                                    </a>
                                </td>
                            </tr>
                        </table>

                        <?php $lateral++; ?>
                        <?php if ($lateral == 3){ ?>
                        </td>
                        <tr>
                        <tr>
                        <?php $lateral =0; ?>
                        <?php } else echo "</td><td>";			 ?>
                <?php } ?>
                </td>
            </tr>
        </table>
    
        </article>
		<?php $totalVendidos = 0; ?>

        <br>
        <hr>
        <a name="grupos">
		    <h2>Estadísticas</h2>
		    <article class="ajuste">
                <?php for ($i=0; $i<3; $i++){ ?>
                    <div class='celda'>
                        Grupo <?= $i+1; ?>.
                        <br>
                        Cartones vendidos: <?= $grupos[$i]; ?>
                        <?php $totalVendidos += $grupos[$i]; ?>
                    </div>
                <?php } ?>
                <div class="celda">
                    <?php $quedan = 1200 - $totalVendidos; ?>
                    <b>TOTAL:
                    <br>
                    Cartones vendidos: <?= $totalVendidos; ?>
                    <br>
                    Quedan por vender: <?= $quedan; ?>
                    </b>
                </div>
		    </article>

		
            <br><br><br>

		<button id="borraTodo" class="boton">Borrar todos los bingos</button>
        <br><br><br>
		</article>

        <hr>
	
		<a name="formulario"></a>
		<h2>Introducir nuevo nombre</h2><br>
		<article style="width: 80%; border: 1px solid; padding: 20px; margin: 0 auto;">
			<form name="formu_bingo" method="post" class="formulario">
    			Número de cartón: <input type="number" name="id" style="width: 80px;" /> 
                Grupo: <input name="grupo" type="number" style="width: 80px;" /><br/><br>
    			Nombre: <input name="nombre" type="text" class="tope"/><br/><br>
    			Dirección: <input name="direccion" type="text" class="tope"/><br/>
				<br>
    			
      			<input type="submit" name="button" id="button" class="boton2" value="Enviar" />
    		</form>
    		<br><br>
		</article>
	</section>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
        $title = "Bingo Santa Cruz Calle Cabo";
        $script = ["bingo"];