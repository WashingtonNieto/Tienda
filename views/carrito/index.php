
<h1>Salidas</h1>

<?php if(isset($_SESSION['identity'])):?>
<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
    </tr>
    <?php 

    foreach($carrito as $indice => $elemento): 
    //foreach($_SESSION['carrito'] as $indice => $elemento): 
        $producto = $elemento['producto'];
    ?>
    <tr>
        <td>
            <?php if ($producto->imagen != null): ?>
                <img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" class="img_carrito" />
            <?php else: ?>
                <img src="<?= base_url ?>assets/img/camiseta.png" class="img_carrito"/>
            <?php endif; ?>
        </td>
        <td><a href="<?= base_url ?>producto/ver&id=<?=$producto->id?>"><?=$producto->nombre?></td>
        <td><?=$producto->precio?></td>
        <td><?=$elemento['unidades']?></td>
    </tr>
    <?php endforeach; ?>
        
</table>
<br/>

<div class="total-carrito">
    <?php $stats = Utils::statscarrito(); ?>
    <h3>Precio total: $<?=$stats['total']?> </h3>
    <a href="<?=base_url?>pedido/hacer" class="button button-pedido">Hacer pedido</a>
</div>
   
<?php else:?>
    <h1>Necesitas estar identificado</h1>
    <p>Necesitas estar logeado en la web para poder realizar tu pedido.</p>
<?php endif; ?>
