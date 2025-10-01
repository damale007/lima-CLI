 <div>
    <div class="grupos">
        <a href="/estadisticasPedida?grupo=<?= $grupo; ?>">Estadisticas</a>
        <a href="/pedida?grupo=99">Todos</a>
        <a href="/pedida?grupo=1">1</a>
        <a href="/pedida?grupo=2">2</a>
        <a href="/pedida?grupo=3">3</a>
    </div>
</div>
<div class='buscador'>
    <form action='/pedida' method='POST'>
        <input type="hidden" name="grupo" value="<?= $grupo; ?>">
        <input type="text" name="direccion" placeholder="Dirección">
        <input type="submit" value="Buscar">
    </form>
    <a href="/nuevoPedida?grupo=<?= $grupo; ?>&b=<?= $busca; ?>"><button>+ Añadir</button></a>
</div>