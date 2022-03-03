<h1>Crear nuevos product</h1>

<form action="<?=base_url?>>producto/save" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" />

    <label for="descripcion">Descripcion</label>
    <textarea name="descripcion"></textarea>

    <label for="precio">Precio</label>
    <input type="text" name="precio" />

    <label for="stock">Stock</label>
    <input type="number" name="stock" />

    <label for="categoria">Categoria</label>
    <?php $categorias = Utils::showCategorias(); ?>
    <select name="categoria">
        <?php while($cat = $categorias->fetch_object()): ?>
        <option value="<?=$cat->id?>">
            <?=$cat->nombre ?>
        </option>
        <?php endwhile; ?>
        
    </select>
    
</form>