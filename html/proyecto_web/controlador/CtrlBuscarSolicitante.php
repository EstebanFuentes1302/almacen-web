<?php
    session_start();
    $sesion=$_SESSION['usuario'];
    $value=$_GET['r'];
    $boton=$_POST['btnBuscar'];
    if($sesion!=null){
        if(isset($boton) or isset($value)){
            include_once('../modelo/Solicitante.php');
            $codigo=$_POST['txtCodigo'];
            $solicitante=buscarSolicitante($codigo);
            if(count($solicitante)>0){
                switch($value){
                    case 1:
                        include_once('../vista/FrmModificarSolicitante.php');
                        frmModificarSolicitanteShowDatos($solicitante);
                        break;
                    case 2:
                        include_once('../vista/FrmEliminarSolicitante.php');
                        frmEliminarSolicitanteShowDatos($solicitante);
                }            
            }else{
                include_once('../vista/FrmMensaje.php');
                frmMensajeShow("No se pudo encontrar el Solicitante","<a href='../controlador/CtrlShowMenuSolicitante.php'>Volver Al Menú</a>");
            }
        }else{
            include_once('../vista/FrmMensaje.php');
            frmMensajeShow("Acceso Denegado, ingrese por el formulario","<a href='../controlador/CtrlShowMenuSolicitante.php'>Volver al menú</a>");
            die();
        }
        
    }else{
        include_once('../vista/FrmMensaje.php');
        frmMensajeShow("Acceso Denegado, no ha iniciado sesión","<a href='../controlador/CtrlShowLogin.php?r=value'>Inicio de sesión</a>");
        die();
    }
