<div class='espaciado'></div>
<section class="documento pedida">	
   <?php include '../app/vistas/pedida/cabecera.php'; ?>

    <h2 style="margin: 15px;">
    <?php 
        if ($grupo == 99) 
            echo "Todos los grupos";
        else
            echo "Grupo: ".$grupo;
    ?>    
    </h2>

    <ul>
    <?php
        $voy = 0;
        if (count($pedida)) {
            foreach ($pedida as $persona) { ?>
                <li <?php if ($voy % 2 ==0) echo "class='gris'"; ?>>
                <div class = "nombreDir">
                    <a href="/nuevoPedida?grupo=<?= $grupo; ?>&id=<?= $persona->id; ?>&b=<?= $busca; ?>">
                        <span class='nombre'>
                        <?= $persona->nombre; ?> <br></span>
                        <span class='direccion'>
                        <?= $persona->direccion.", ".$persona->numero; ?></span>
                    </a>
                </div>
                <div>
                    <button class='amarillo' 
                        data-id='<?= $persona->id; ?>' 
                        data-nombre='<?= $persona->nombre; ?>' 
                        data-busca='<?= $busca; ?>'
                        data-grupo='<?= $grupo; ?>'
                        data-direccion='<?= $persona->direccion.", ".$persona->numero; ?>'>
                        <img src='imagenes/euro.png' class='imagen'> </button>

                    <button class='naranja'
                        data-id='<?= $persona->id; ?>' 
                        data-nombre='<?= $persona->nombre; ?>' 
                        data-busca='<?= $busca; ?>'
                        data-grupo='<?= $grupo; ?>'
                        data-direccion='<?= $persona->direccion.", ".$persona->numero; ?>'>
                        <img src='imagenes/papelera.png' class='imagen'> </button>
                </div>
            </li>
            <?php
            $voy++;
            }
        }
    ?>
    </ul>
    <p style="margin: 10px; margin-bottom: 25px;">
        <?= count($pedida) ?> registros 
    </p>

    <h2 style="margin:10px;">Ya han colaborado...</h2>

    <?php 
        if (count($pagado) >0) {
            foreach ($pagado as $persona) { ?>
                <li>
                <div>
                    <span class='nombre'>
                    <?= $persona->nombre; ?> - 
                    <?= $persona->direccion.", ".$persona->numero; ?></span>
                </div>
            <?php
            }
        }
    ?>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
        $script = ["pedida"];