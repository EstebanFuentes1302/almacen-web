<?php
    session_start();
    $sesion=$_SESSION['usuario'];
    $boton=$_POST['btnModificar'];
    $codigo=$_GET['r'];
    $oldcantidad=$_GET['s'];
    $codigo_articulo=$_GET['t'];
    if($sesion!=null){
        if(isset($boton)){
            include_once('../modelo/Pedido.php');
            $cantidad=$_POST['txtCantidad'];
            $fecha=$_POST['txtFecha'];
            $result=modificarPedido($codigo,$codigo_articulo,$cantidad,$oldcantidad,$fecha);
            if($result){
                include_once('../vista/FrmMensajeAprobado.php');
                frmMensajeAprobadoShow("Pedido modificado","Pedido Modificado Correctamente",array("<a href='../controlador/CtrlShowModificarPedido.php?r=value'>Modificar Otro Artículo</a>","<a href='../controlador/CtrlShowMenuPedido.php?r=value'>Volver Al Menú</a>"));
            }else{
                include_once('../vista/FrmMensaje.php');
                frmMensajeShow("Error al modificar Pedido","<a href='../controlador/CtrlShowModificarPedido.php'>Intentar Nuevamente</a>");
            }
        }else{
            include_once('../vista/FrmMensaje.php');
            frmMensajeShow("No es el acceso correcto","<a href='../controlador/CtrlShowMenuPedido.php'>Volver Al Menú</a>");
        }
    }else{
        include_once('../vista/FrmMensaje.php');
        frmMensajeShow("Acceso Denegado, no ha iniciado sesión","<a href='../controlador/CtrlShowLogin.php?'>Inicio de sesión</a>");
        die();
    }
    
?>