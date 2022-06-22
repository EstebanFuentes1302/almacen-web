<?php
    session_start();
    $sesion=$_SESSION['usuario'];
    $boton=$_POST['btnDevolver'];
    $codigo_pedido=$_GET['r'];
    $cantidad=$_GET['s'];
    $codigo_articulo=$_GET['t'];
    if($sesion!=null){
        if(isset($boton)){
            
            include_once('../modelo/Pedido.php');
            include_once('../modelo/Devolucion.php');
            $fecha_devolucion=str_replace("/","-",$_POST['fecha_devolucion']);
            $detalles=$_POST['txtaDetalles'];
            
            $devolver=devolverPedido($codigo_pedido,$codigo_articulo,$cantidad);
            
            if($devolver){
                $registrar=registrarDevolucion($codigo_pedido,$fecha_devolucion,$detalles);
                if($registrar){
                    include_once('../vista/FrmMensajeAprobado.php');
                    frmMensajeAprobadoShow("Pedido Devuelto","Pedido Devuelto Correctamente",array("<a href='../controlador/CtrlShowRegistrarDevolucion.php'>Devolver otro pedido</a>","<a href='../controlador/CtrlShowMenuDevolucion.php'>Volver Al Menú</a>"));
                }else{
                    include_once('../vista/FrmMensaje.php');
                    frmMensajeShow("Error al registrar Devolucion","<a href='../controlador/CtrlShowRegistrarDevolucion.php'>Intentar Nuevamente</a>");
                }
                
            }else{
                include_once('../vista/FrmMensaje.php');
                frmMensajeShow("Error al modificar Pedido","<a href='../controlador/CtrlShowRegistrarDevolucion.php'>Intentar Nuevamente</a>");
            }
        }else{
            include_once('../vista/FrmMensaje.php');
            frmMensajeShow("No es el acceso correcto","<a href='../controlador/CtrlShowMenuDevolucion.php'>Volver Al Menú</a>");
        }
    }else{
        include_once('../vista/FrmMensaje.php');
        frmMensajeShow("Acceso Denegado, no ha iniciado sesión","<a href='../controlador/CtrlShowLogin.php?'>Inicio de sesión</a>");
        die();
    }
    
?>