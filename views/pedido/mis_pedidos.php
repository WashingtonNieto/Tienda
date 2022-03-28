<?php if(isset($gestion)): ?>
    <h1>Gestionar pedidos</h1>

<?php else: ?>

<?php endif; ?>


<table>
    <tr>
        <th>No. Pedido</th>
        <th>Costo</th>
        <th>Fecha</th>
        <th>Estado</th>
    </tr>
    <?php 
        while($ped = $pedidos->fetch_object()):
    ?>
    <tr>
        <td><a href="<?=base_url?>pedido/detalle&id=<?=$ped->id?>"><?=$ped->id?></td>
        <td><?=$ped->coste?></td>
        <td><?=$ped->fecha?></td>
        <td><?= Utils::showStatus($ped->estado)?></td>
    </tr>
    <?php endwhile; ?>
        
</table>
