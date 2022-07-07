<?php
    session_start();
    $sesion = $_SESSION['usuario'];
    if($sesion != null){
        $codigo=$_POST['codigo'];
        if(isset($codigo)){
            include_once('../modelo/Solicitante.php');
            $s = new Solicitante;
            $solicitante = $s ->  buscarSolicitante($codigo);
            if($solicitante != null){
                echo json_encode($solicitante);
            }else{
                echo json_encode('null');
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
?>