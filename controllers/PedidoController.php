<?php 

ob_start();

require_once 'models/pedido.php';

class PedidoController {

    public function hacer() {

        require_once 'views/pedido/hacer.php';
    }

    public function add() {
        if (isset($_SESSION['identity'])) {
            $usuario_id = $_SESSION['identity']->id;
            $departamento = isset($_POST['departamento']) ? $_POST['departamento'] : false;
            $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;

            $stats = Utils::statsCarrito();
            $coste = $stats['total'];

            if ($departamento && $ciudad && $direccion) {
                // Guardar datos en bd
                $pedido = new Pedido();
                $pedido->setUsuario_id($usuario_id);
                $pedido->setDepartamento($departamento);
                $pedido->setCiudad($ciudad);
                $pedido->setDireccion($direccion);
                $pedido->setCoste($coste);

                $save = $pedido->save();

                // Guardar linea pedido
                $save_linea = $pedido->save_linea();

                if ($save && $save_linea) {
                    $_SESSION['pedido'] = "complete";
                } else {
                    $_SESSION['pedido'] = "failed";
                }
            } else {
                $_SESSION['pedido'] = "failed";
            }
                //header("Location:" . base_url . 'pedido/confirmado');
                echo '<script>window.location="'.base_url.'pedido/confirmado"</script>';
            
        } else {
            // Redigir al index
            header("Location:" . base_url);
        }
    }

    public function confirmado() {
        if(isset($_SESSION['identity'])) {
            $identity = $_SESSION['identity'];
            $pedido = new Pedido();
            $pedido->setUsuario_id($identity->id);

            $pedido = $pedido->getOneByUser();

            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductoByPedido($pedido->id);
        }
        require_once 'views/pedido/confirmado.php';
    }

}
