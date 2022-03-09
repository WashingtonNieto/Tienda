<?php

require_once 'models/pedido.php';

class PedidoController{
    public function hacer(){
        require_once 'views/pedido/hacer.php';
    }
    
    public function add(){
        //var_dump($_POST);
        if(isset($_SESSION['identity'])){
            $usuario_id = $_SESSION['identity']->id;
            $departamento = isset($_POST['departamento']) ? $_POST['departamento'] : false;
            $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            
            $stats = Utils::statscarrito();
            $coste = $stats['total'];
            
            if($departamento && $ciudad && $direccion){
                //Guardar datos en bd
                $pedido = new Pedido();
                $pedido->setUsuario_id($usuario_id);
                $pedido->setDepartamento($departamento);
                $pedido->setCiudad($ciudad);
                $pedido->setDireccion($direccion);
                $pedido->setCoste($coste);
                
                $save = $pedido->save();
                
                //Guardar linea de pedido
                $save_linea = $pedido->save_linea();
                
                if($save && $save_linea){
                    $_SESSION['pedido'] = 'complete';
                }else{
                    $_SESSION['pedido'] = 'failed';
                }
                //var_dump($pedido);
            } else {
                $_SESSION['pedido'] = 'complete';
            }
            //Redirigir al metodo confirmado
            if (!headers_sent()) {
                header('Location:' . base_url.'pedido/confirmado.php');
            }

            
        }else{
            //Redirigir al index
            if (!headers_sent()) {
                header('Location:' . base_url);
            }
            
        }
        
        
    }
    public function confirmado(){
        require_once 'views/pedido/confirmado.php';

    }
}
