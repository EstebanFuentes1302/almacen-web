<?php
    session_start();
    $sesion=$_SESSION['usuario'];

    if($sesion!=null){
        $codigo=$_POST['codigo'];
        $codigo_articulo=$_POST['codigo_articulo'];
        $cantidad=$_POST['cantidad_pedido'];
        if(isset($codigo) and isset($codigo_articulo) and isset($cantidad)){
            include_once('../modelo/Pedido.php');
            $p = new Pedido;
            $result = $p -> eliminarPedido($codigo,$codigo_articulo,$cantidad);
            if($result){
                echo json_encode('true');
            }else{
                echo json_encode('false');
            }
        }else{
            include_once('../vista/FrmMensaje.php');
            frmMensajeShow("<p class='p'>No es el acceso correcto<p>","<a class='link-p' href='../controlador/CtrlShowLogin.php'>Volver</a>");
            die();
        }
    }else{
        include_once('../vista/FrmMensaje.php');
        frmMensajeShow("<p class='p'>Acceso Denegado, no ha iniciado sesión<p>","<a class='link-p' href='../controlador/CtrlShowLogin.php'>Inicio de sesión</a>");
        die();
    }

    
?>