<?php
    session_start();
    $sesion=$_SESSION['usuario'];

    if($sesion!=null){
        $codigo=$_GET['r'];
        $codigo_articulo=$_GET['s'];
        $cantidad=$_GET['t'];
        if(isset($codigo) and isset($codigo_articulo) and isset($cantidad)){
            include_once('../modelo/Pedido.php');
            $result=eliminarPedido($codigo,$codigo_articulo,$cantidad);
            if($result){
                include_once('../vista/FrmMensajeAprobado.php');
                frmMensajeAprobadoShow("Pedido eliminado","Pedido Eliminado Correctamente",array("<a href='../controlador/CtrlShowEliminarPedido.php'>Eliminar Otro Pedido</a>","<a href='CtrlShowMenuPedido.php'>Volver Al Menú</a>"));
            }else{
                include_once('../vista/FrmMensaje.php');
                frmMensajeShow("Error al eliminar Pedido","<a href='../controlador/CtrlShowEliminarPedido.php>Intentar Nuevamente</a>");
            }
        }else{
            include_once('../vista/FrmMensaje.php');
            frmMensajeShow("No es el acceso correcto","<a href='../controlador/CtrlShowLogin.php'>Volver</a>");
        }
    }else{
        include_once('../vista/FrmMensaje.php');
        frmMensajeShow("Acceso Denegado, no ha iniciado sesión","<a href='../controlador/CtrlShowLogin.php'>Inicio de sesión</a>");
        die();
    }

    
?>