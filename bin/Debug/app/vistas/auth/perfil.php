<div class='espaciado'></div>
<div class="perfil">
    <div class = "contenedor">
        <main>
            <img src="<?= $avatar; ?>">
            <br><br>
            <h1>Perfil de <?= descifrar($usuario->nombre)." ".descifrar($usuario->apellidos); ?></h1>
            <?= decode($usuario->email)." - DNI: ".decode($usuario->dni); ?>

            <br><br>
            Id usuario: <?= $usuario->id; ?> - <?= $role ?> - Fecha de alta: <?= dateFormat($usuario->created_at); ?>

            <br>
            <?= $hermano; ?>

            <p>
                <a href="/mensajesBloqueados">
                    <?= $mensajesBloqueados; ?> Mensajes ocultos | 
                    <?= $usuariosBloqueados; ?> Usuarios bloqueados
                </a>
            </p>
        </main>

        <aside>
            <div class="ajuste">
                <a href="/edita-perfil" class="boton">Editar perfil</a>
                <a href="/password" class="boton">Cambiar contraseña</a>
                <a href="/hermano" class="boton">Modificar datos de Hermano</a>
                <a href="/domiciliar" class="boton">Domiciliar pago</a>
                <a href="" class="boton">Ver denuncias</a>
                <a href="" class="boton">Ver errores</a>
                <a href="" class="boton">Eliminar cuenta</a>
            </div>
        </aside>
    </div>
</div>
