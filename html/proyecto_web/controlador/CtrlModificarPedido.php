<?php
    session_start();
    $sesion=$_SESSION['usuario'];
    $codigo=$_POST['codigo'];
    $estado = $_POST['estado'];
    if($sesion != null){
        if(isset($codigo) && isset($estado)){
            include_once('../modelo/Pedido.php');
            $p = new Pedido;
            $result = $p -> modificarPedido($codigo, $estado);
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