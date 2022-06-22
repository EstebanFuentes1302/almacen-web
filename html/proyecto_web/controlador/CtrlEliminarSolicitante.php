<?php
    session_start();
    $sesion=$_SESSION['usuario'];

    if($sesion!=null){
        $codigo=$_GET['r'];
        if(isset($codigo)){
            include_once('../modelo/Solicitante.php');
            $result=eliminarSolicitante($codigo);
            if($result){
                include_once('../vista/FrmMensajeAprobado.php');
                frmMensajeAprobadoShow("Solicitante eliminado","Solicitante Eliminado Correctamente",array("<a href='../controlador/CtrlShowEliminarSolicitante.php'>Eliminar Otro Solicitante</a>","<a href='../controlador/CtrlShowMenuSolicitante.php'>Volver Al Menú</a>"));
            }else{
                include_once('../vista/FrmMensaje.php');
                frmMensajeShow("Error al eliminar Solicitante","<a href='../controlador/CtrlShowModificarSolicitante.php?r=value>Intentar Nuevamente</a>");
            }
        }else{
            include_once('../vista/FrmMensaje.php');
            frmMensajeShow("No es el acceso correcto","<a href='../controlador/CtrlShowLogin.php?r=value'>Inicio de sesión</a>");
        }
    }else{
        include_once('../vista/FrmMensaje.php');
        frmMensajeShow("No es el acceso correcto","<a href='../controlador/CtrlShowLogin.php?r=value'>Inicio de sesión</a>");
        die();
    }

    
?>