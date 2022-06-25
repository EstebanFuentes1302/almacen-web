<?php
    session_start();
    $sesion=$_SESSION['usuario'];
    $codigo=$_POST['codigo'];
    $codigo_articulo=$_POST['codigo_articulo'];
    $cantidad=$_POST['cantidad'];
    $oldcantidad = $_POST['oldcantidad'];
    if($sesion!=null){
        if(isset($codigo) && isset($codigo_articulo) && isset($cantidad) && isset($oldcantidad)){
            include_once('../modelo/Pedido.php');
            
            $fecha=$_POST['txtFecha'];
            $result=modificarPedido($codigo,$codigo_articulo,$cantidad,$oldcantidad);
            if($result){
                echo json_encode('true');
            }else{
                echo json_encode('false');
            }
        }else{
            include_once('../vista/FrmMensaje.php');
            frmMensajeShow("<p class='p'>No es el acceso correcto<p>","<a class='link-p'  href='../controlador/CtrlShowMenuPedido.php?r=value>Volver</a>");
            die();
        }
    }else{
        include_once('../vista/FrmMensaje.php');
        frmMensajeShow("<p class='p'>Acceso Denegado, no ha iniciado sesión<p>","<a class='link-p' href='../controlador/CtrlShowLogin.php?r=value'>Inicio de sesión</a>");
        die();
    }
    
?>