<h1>Gestion de categorias</h1>

<a href="<?=base_url?>categoria/crear" class="button button-small">
    Crear Categoria
</a>

<?php if(isset($_SESSION['categoria']) && $_SESSION['categoria'] == 'complete'): ?>
    <strong class="alert_green"> La categoria ha sido creado exitosamente</strong>
<?php elseif(isset($_SESSION['categoria']) && $_SESSION['categoria'] != 'complete'): ?>
    <strong class="alert_red"> La categoria NO ha sido creado exitosamente</strong>
<?php endif;?>

<?php Utils::deleteSession('categoria');?>
    
<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert_green"> La categoria ha sido borrado exitosamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>
    <strong class="alert_red"> La categoria NO ha sido borrado correctamente</strong>
<?php endif;?>

<?php Utils::deleteSession('delete');?>
    
<table border="1">
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
    </tr> 
   <?php while($cat = $categorias->fetch_object()): ?>

    <tr>
        <td><?=$cat->id; ?></td>
        <td><?=$cat->nombre; ?></td>
        <td>
            <!-- 
                <a href="<?=base_url?>producto/editar?id=<?=$pro->id?>" class="button button-gestion">Editar</a>
                al usar ? trae el siguiente parametro no el primero como queremos
                para que traiga el primer parametro se usa &
            -->

            <a href="<?=base_url?>categoria/editar&id=<?=$pro->id?>" class="button button-gestion">Editar</a>
            <a href="<?=base_url?>categoria/eliminar&id=<?=$pro->id?>" class="button button-gestion button-red">Eliminar</a>
        </td>
    </tr>
        
    <?php endwhile; ?>
</table>