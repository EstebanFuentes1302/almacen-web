<?php
    session_start();
    $sesion=$_SESSION['usuario'];

    if($sesion!=null){
        include_once('../vista/FrmVerPedidos.php');
        include_once('../modelo/Pedido.php');
        $p = new Pedido;
        $pedidos = $p -> getPedidos();
        $frm = new FrmVerPedidos;
        $frm -> frmVerPedidosShow($pedidos);
    }else{
        include_once('../vista/FrmMensaje.php');
        $frm = new FrmMensaje;
        $frm -> frmMensajeShow("<p class='p'>Acceso Denegado, no ha iniciado sesión<p>","<a class='link-p' href='../controlador/CtrlShowLogin.php?r=value'>Inicio de sesión</a>");
        die();
    }
    
    
?>  
