  
<?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>
    <h1>Tu pedido se ha confirmado</h1>
    <p>
        Tu pedido ha sido guardado con éxito, una vez que realices la transferencia
        bancaria con el coste del pedido, será procesado y enviado.
    </p>
    <br/>
    <?php if(isset($pedido)): ?>
        <h3>Datos del pedido</h3>
        Número del pedido: <br/>
        Total a pagar: <br/>
        Productos:
    <?php endif; ?>
    
    
    
<?php elseif(isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete'): ?>
    <h1>Tu pedido NO se ha confirmado</h1>-->
<?php endif?>
