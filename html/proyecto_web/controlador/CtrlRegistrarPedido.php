<?php
    session_start();
    $sesion=$_SESSION['usuario'];

    if($sesion!=null){
            $cod_articulo=$_POST['txtCodigoArticulo'];
            $cod_solicitante=$_POST['txtCodigoSolicitante'];
            $cantidad=$_POST['txtCantidad'];
            $fecha=str_replace("/","-",$_POST['date']); 
            $estado=$_POST['sEstado'];
            include_once('../modelo/Pedido.php');
            $registrar=registrarPedido($cod_articulo,$cod_solicitante,$estado,$fecha,$cantidad);
            if($registrar){
                include_once('../vista/FrmMensajeAprobado.php');
                frmMensajeAprobadoShow("Pedido Agregado","El pedido fue agregado exitosamente",array("<a href='../controlador/CtrlShowRegistrarPedido.php'>Agregar otro pedido</a>","<a href='../controlador/CtrlShowMenuPedido.php'>Volver Al Menú</a>"));
            }else{
                include_once('../vista/FrmMensaje.php');
                frmMensajeShow("No se pudo registrar el pedido","<a href='../controlador/CtrlShowRegistrarPedido.php'>Intentar Nuevamente</a>");
            }
    }else{
        include_once('../vista/FrmMensaje.php');
        frmMensajeShow("Acceso Denegado, no ha iniciado sesión","<a href='../controlador/CtrlShowLogin.php?r=value'>Inicio de sesión</a>");
        die();
    }
    
    
?>