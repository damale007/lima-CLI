<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : TITLE; ?></title>

    <meta name="description" content="<?php echo isset($description) ? $description : DESCRIPTION; ?>">

    <link rel="icon" href="favicon.ico" />

    <link href="/css/mvc.css?i=<?= rand(0,255); ?>" rel="stylesheet">
    <link href="/css/app.css?i=<?= rand(0,255); ?>" rel="stylesheet">
    <link href="/css/calendario.css?i=<?= rand(0,255); ?>" rel="stylesheet">
</head>

<body>

    <!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
    <script>
        window.cookieconsent_options = {"message":"Usamos cookies para personalizar su experiencia. Si sigue navegando estará aceptando su uso.","dismiss":"Aceptar","learnMore":"<a aria-label='Más información' tabindex='0' class='cc-link' href='info.php' target='_blank'>Más información</a>","link":null,"theme":"dark-bottom"};
    </script>

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.9/cookieconsent.min.js"></script>
    <!-- End Cookie Consent plugin -->

    <header>
        <div id="contenedorImagen" class="imagenGrande">
            <a href="javascript: cierra();">
                <img src="/imagenes/cierra.png" class="cierra pulsable">
            </a>
            <br>
            <img src="/imagenes/cierra.png" id="imagen" alt="primeraImagen" />
        </div>

        <div id="buscador" class="imagenGrande">
            <img src="imagenes/cierra.png" class="cierra pulsable" id='cierraBuscador'>
            <br>
            <form action='/buscador' method='POST'>
                <input type='text' placeholder='Texto a buscar' name='busca' class='inputBuscador'>
                <input type='submit' value='Buscar' class='botonBuscar'>
                <br><br>

                <span class='checkButton'>
                    <input type="checkbox" id='noticias' name='noticias' checked>
                    <label for='noticias'>Noticias</label>
                </span>

                <span class='checkButton'>
                    <input type="checkbox" id='videos' name='videos' checked>
                    <label for='videos'>Videos</label>
                </span>

                <span class='checkButton'>
                    <input type="checkbox" id='eventos' name='eventos' checked>
                    <label for='eventos'>Eventos</label>
                </span>

                <span class='checkButton'>
                    <input type="checkbox" id='reinapre' name='reinapre' checked>
                    <label for='reinapre'>Reinas / Damas / Pregoneros /Cartelistas</label>
                </span>

                <span class='checkButton'>
                    <input type="checkbox" id='junta' name='junta' checked>
                    <label for='junta'>Miembros de junta</label>
                </span>
            </form>
        </div>

        <div class="pildora">
            <div class='menu'>
                <img src="/imagenes/menu.png" class="hamburguesa" alt="Menú principal">
                <a href="/" class="logo">
                    <img src='/imagenes/logoweb.webp' class='logo' alt='Logo Hermandad Santa Cruz Calle Cabo'>
                </a>
                <ul class="contenedor-menu"> 
                    <a href="/noticias"><li>Noticias</li></a>
                    <a href="/fiestas"><li>Fiestas</li></a>
                    <a href="/videos"><li>Videos</li></a>
                    <a href="/musica"><li>Música</li></a>
                    <a href="/comunidad"><li>Comunidad</li></a>
                </ul> 
            </div>
        </div>

        <div class="ajuste" style="justify-content: flex-end;">
            <div class='pildora'>
                <img src='/imagenes/lupa.webp' alt='Lupa' class='lupa pulsable' id='lupa'>
            </div>

            <div class='pildora'>
                <?php if (isLogin()) { ?>
                    <div class="zona-usuario">
                        <?php $imagen = imagenUsuario(); ?>
                        <?php if (!$imagen) { ?>
                            <img src="/imagenes/user.png" class="icono-usuario pulsable" alt="Usuario" id='despliegaMenu'>
                        <?php } else {?>
                            <img src="<?= $ruta.$imagen; ?>" class="icono-usuario pulsable" alt="Usuario" id='despliegaMenu'>
                        <?php } ?>
                        
                        <span id='despliegaMenu' class='pulsable'>
                            <?= getNombre(); ?>
                        </span>
                        <img src="/imagenes/desplegar.png" class="desplegar" alt="Desplegar menu" id="despliegaMenu">
                    </div>
                <?php } else { ?>
                    <div class='registroLogin'>
                        <a href='/login'>Registrarse/Login</a>
                    </div>
                
                <?php } ?>
            </div>
        </div>

        <?php if (isLogin()) { ?>
            <div class="menu-usuario">
                <p class="email">
                        <?= getEmail(); ?>
        </p>
                <ul>
                    <li>
                        <a href="/perfil">Perfil</a>
                    </li>

                    <?php if (!isUser()) { ?>
                        <li>
                            <a href="/admin">Administrar web</a>
                        </li>  

                        <li>
                            <a href="/usuarios">Usuarios</a>
                        </li> 
                    <?php } ?> 
    
                    <li>
                    <a href="/historial">Historial</a>
                    </li>  

                    <?php if (!isUser()) { ?>
                        <li>
                        <a href="/bingo">Bingo</a>
                        </li>  

                        <li>
                        <a href="/pedida">Pedida</a>
                        </li>  
                    <?php } ?>

                    <?php if (isSecretaria()) { ?>
                        <li>
                        <a href="/secretaria">Secretaría</a>
                        </li>  
                    <?php } ?>
                    
                    <li>
                        <a href="/cierra-sesion">Cerrar sesión</a>
                    </li>  
                </ul>
            </div>
        <?php } ?>

</header>
<main>