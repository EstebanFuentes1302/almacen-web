<?php
    session_start();
    $sesion=$_SESSION['usuario'];
    $boton=$_POST['btnModificar'];
    $codigo=$_GET['r'];
    if($sesion!=null){
        if(isset($boton) and isset($codigo)){
            include_once('../modelo/Solicitante.php');
            $nombre=$_POST['txtNombre'];
            $correo=$_POST['txtCorreo'];
            $tel=$_POST['txtTelefono'];
            $result=modificarSolicitante($codigo,$nombre,$correo,$tel);
            if($result){
                include_once('../vista/FrmMensajeAprobado.php');
                frmMensajeAprobadoShow("Solicitante modificado","Solicitante Modificado Correctamente",array("<a href='../controlador/CtrlShowModificarSolicitante.php'>Modificar Otro Solicitante</a>","<a href='../controlador/CtrlShowMenuSolicitante.php'>Volver Al Menú</a>"));
            }else{
                include_once('../vista/FrmMensaje.php');
                frmMensajeShow("Error al modificar Solicitante","<a href='../controlador/CtrlShowModificarArticulo.php>Intentar Nuevamente</a>");
                die();
            }
        }else{
            include_once('../vista/FrmMensaje.php');
            frmMensajeShow("No es el acceso correcto","<a href='../controlador/CtrlShowMenuSolicitante.php>Volver Al Menú</a>");
            die();
        }
    }else{
        include_once('../vista/FrmMensaje.php');
        frmMensajeShow("Acceso Denegado, no ha iniciado sesión","<a href='../controlador/CtrlShowLogin.php'>Inicio de sesión</a>");
        die();
    }