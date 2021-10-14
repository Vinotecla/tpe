{include file="templates/header.tpl"}
<div class="contenido">
    <div>
        <h2>Nuestros vinos</h2>
        <p>Bienvenidos a nuestra tienda. Estamos orgullosos de ofrecerle una amplia selección de las mejores bebidas</p>
    </div>
    <div class="contenedorbebidas">
        <table>
            <form action="filtro" method="post">
            <select name='filtros'>
            <option value="Todo">Todo</option>
            {include file="templates/selectCategorias.tpl"}
                <button type="submit">Fitrar</button>
            </form>
            <thead>
                <tr>
                    <th id="filtro-variedad">
                        TIPO
                    </th>
                    <th>
                        NOMBRE
                    </th>
                    <th>
                        CONTENIDO
                    </th>
                    <th>
                        PRECIO
                    </th>
                <tr>
            </thead>
            <tbody id="pedido-ingresado">
            {foreach from=$bevidas item=$b}
                <tr>
                    <th><a href='description/{$b->tipo}'>{$b->tipo}</a></th>
                    <th><a href='item/{$b->id_vinos}'>{$b->nombre}</a></th>
                    <th>{$b->contenido}ML</th>
                    <th>${$b->precio}</th>
                <tr>
            {/foreach}
            </tbody >
        </table>
        <p></p>
    </div>

</div>
{include file="templates/footer.tpl"}