<div class='espaciado'></div>
<section class="documento pedida">	
    <?php include '../app/vistas/pedida/cabecera.php'; ?>

        <p><a href="/estadisticasPedida?or=<?= $ordenInverso; ?>&grupo=<?= $grupo; ?>" style="background: green; padding: 5px; margin: 5px; color: white; border-radius: 4px;" >
            <?php if ($orden == 0) 
                echo "Ordenar por cantidad";
            else  echo "Orden alfabético"; ?>
            </a></p>

        <br><br>
        
        <ul>
            <?php
                $voy = 0;
                $calle = "";
                $calleNormal = "";
                $contador = 1;
                $calleNormalOrden = array(99);
                $cantidadOrden = array(99);
                foreach($pedida as $linea) { 
                    $direc = strtolower(trim($linea->direccion));
                    if ($direc != $calle && $calle != "") {
                        if ($orden == 0) {
                            ?>
                            <li <?php if ($voy % 2 ==0) echo "class='gris'"; ?>>
                                <div>
                                    <a href="index.php?grupo=<?= $grupo; ?>&busca=<?= $calle; ?>">
                                        <span class='direccion'>
                                        <?= $calleNormal; ?> Quedan <?= $contador; ?></span>
                                    </a>
                                </li>
                            <?php
                        } else {
                            $calleNormalOrden[$voy] = $calleNormal;
                            $cantidadOrden[$voy] = $contador;
                        }
                        $voy++;
                        $contador = 1;
                    } else {
                        $contador++;
                    }
                    $calle = $direc;
                    $calleNormal = trim($linea->direccion);
                }

                if ($orden !=0) {
                    for ($i=0; $i<$voy; $i++)
                        for ($j=$i; $j<$voy; $j++) {
                            if ($cantidadOrden[$j]>$cantidadOrden[$i]) {
                                $swap = $cantidadOrden[$i];
                                $cantidadOrden[$i] = $cantidadOrden[$j];
                                $cantidadOrden[$j] = $swap; 

                                $swap = $calleNormalOrden[$i];
                                $calleNormalOrden[$i] = $calleNormalOrden[$j];
                                $calleNormalOrden[$j] = $swap; 
                            }
                        }

                    for ($i=0; $i<$voy; $i++){
                        ?>
                        <li <?php if ($i % 2 ==0) echo "class='gris'"; ?>>
                            <div>
                                <a href="index.php?grupo=<?= $grupo; ?>&busca=<?= $calleNormalOrden[$i]; ?>">
                                    <span class='direccion'>
                                    <?= $calleNormalOrden[$i]; ?> Quedan <?= $cantidadOrden[$i]; ?></span>
                                </a>
                            </li>
                        <?php
                    }
                }
            ?>
            </ul>

    </body>
    </html>