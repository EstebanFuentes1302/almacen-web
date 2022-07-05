<?php
    session_start();
    $sesion=$_SESSION['usuario'];
    $codigo=$_POST['codigo'];
    if($sesion!=null){
        if(isset($codigo)){
            include_once('../modelo/Solicitante.php');
            $nombre=$_POST['nombre'];
            $correo=$_POST['email'];
            $tel=$_POST['telefono'];
            $result=modificarSolicitante($codigo,$nombre,$correo,$tel);
            if($result){
                echo json_encode("true");
            }else{
                echo json_encode("false");
            }
        }else{
            include_once('../vista/FrmMensaje.php');
            frmMensajeShow("<p class='p'>No es el acceso correcto<p>","<a class='link-p'  href='../controlador/CtrlShowMenuSolicitante.php>Volver</a>");
            die();
        }
    }else{
        include_once('../vista/FrmMensaje.php');
        frmMensajeShow("<p class='p'>Acceso Denegado, no ha iniciado sesión<p>","<a class='link-p' href='../controlador/CtrlShowLogin.php'>Inicio de sesión</a>");
        die();
    }