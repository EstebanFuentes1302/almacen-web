<?php
    session_start();
    $sesion=$_SESSION['usuario'];
    
    if($sesion!=null){
            include_once('../modelo/Pedido.php');
            $codigo=$_POST['codigo'];
            if(isset($codigo)){
                $p = new Pedido;
                $pedido = $p -> buscarPedido($codigo);
                if($pedido){
                    $json = array(
                        'codigo_pedido' => $pedido['codigo_pedido'],
                        'codigo_articulo' => $pedido['codigo_articulo'],
                        'codigo_solicitante' => $pedido['codigo_solicitante'],
                        'cantidad' => $pedido['cantidad'],
                        'fecha_registro' => $pedido['fecha_pedido']
                        
                    );
                    echo json_encode($json);
                }else{
                    echo json_encode("null");
                }      
            }else{
                  echo json_encode("null");
            }
    }else{
        include_once('../vista/FrmMensaje.php');
        frmMensajeShow("<p class='p'>Acceso Denegado, no ha iniciado sesión<p>","<a class='link-p' href='../controlador/CtrlShowLogin.php'>Inicio de sesión</a>");
        die();
    }
