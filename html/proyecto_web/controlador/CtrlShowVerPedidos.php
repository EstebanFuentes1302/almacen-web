<?php
    session_start();
    $sesion=$_SESSION['usuario'];

    if($sesion!=null){
        include_once('../vista/FrmVerPedidos.php');
        include_once('../modelo/Pedido.php');
        $pedidos=getPedidos();
        frmVerArticulosShow($pedidos);
    }else{
        include_once('../vista/FrmMensaje.php');
        frmMensajeShow("Acceso Denegado, no ha iniciado sesión","<a href='../controlador/CtrlShowLogin.php?r=value'>Inicio de sesión</a>");
        die();
    }
    
    
?>  
