<?php
    session_start();
    $sesion=$_SESSION['usuario'];
    $value=$_GET['r'];
    
    if($sesion!=null){
        if(isset($value)){
            include_once('../modelo/Pedido.php');
            $codigo=$_POST['txtCodigo'];
            $pedido=buscarPedido($codigo);
            
            if($pedido){
                switch($value){
                    case 1:
                        include_once('../vista/FrmModificarPedido.php');
                        frmModificarPedidoShowDatos($pedido);
                        break;
                    case 2:
                        include_once('../vista/FrmEliminarPedido.php');
                        frmEliminarPedidoShowDatos($pedido);
                        break;
                    case 3:
                        include_once('../vista/FrmRegistrarDevolucion.php');
                        frmRegistrarDevolucionShowDatos($pedido);
                        break;
                }            
            }else{
                        include_once('../vista/FrmMensaje.php');
                        frmMensajeShow("No se pudo encontrar el Pedido","<a href='../controlador/CtrlShowMenuPedido.php'>Volver Al Menú</a>");
            }
        }else{
            include_once('../vista/FrmMensaje.php');
            frmMensajeShow("<p class='p'>No es el acceso correcto<p>","<a class='link-p' href='../controlador/CtrlShowLogin.php'>Volver</a>");
            die();
        }
        
    }else{
        include_once('../vista/FrmMensaje.php');
        frmMensajeShow("<p class='p'>Acceso Denegado, no ha iniciado sesión<p>","<a class='link-p' href='../controlador/CtrlShowLogin.php?r=value'>Inicio de sesión</a>");
        die();
    }
