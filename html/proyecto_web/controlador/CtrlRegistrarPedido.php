<?php
    session_start();
    $sesion=$_SESSION['usuario'];

    if($sesion!=null){
            $cod_articulo=$_POST['cod_articulo'];
            $cod_solicitante=$_POST['cod_solicitante'];
            $cantidad=$_POST['cantidad'];
            $fecha=str_replace("/","-",$_POST['date']); 
            $estado=$_POST['estado'];
        if(isset($cod_articulo) && isset($cod_articulo) && isset($cod_solicitante) && isset($cantidad) && isset($estado)){
            include_once('../modelo/Pedido.php');
            $p = new Pedido;
            $registrar = $p -> registrarPedido($cod_articulo,$cod_solicitante,$estado,$fecha,$cantidad);
            if($registrar){
                echo json_encode('true');
            }else{
                echo json_encode('false');
            }
        }else{
            echo json_encode('false');
        }
    }else{
        include_once('../vista/FrmMensaje.php');
        frmMensajeShow("Acceso Denegado, no ha iniciado sesión","<a href='../controlador/CtrlShowLogin.php?r=value'>Inicio de sesión</a>");
        die();
    }
    
    
?>