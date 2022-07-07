<?php
    session_start();
    $sesion=$_SESSION['usuario'];
    
    if($sesion!=null){
        include_once('../vista/FrmVerSolicitantes.php');
        include_once('../modelo/Solicitante.php');
        $s = new Solicitante;
        $solicitantes = $s -> getSolicitantes();
        $frm = new FrmVerSolicitantes;
        $frm -> frmVerSolicitantesShow($solicitantes);
    }else{
        include_once('../vista/FrmMensaje.php');
        $frm = new FrmMensaje;
        $frm -> frmMensajeShow("<p class='p'>Acceso Denegado, no ha iniciado sesión<p>","<a class='link-p' href='../controlador/CtrlShowLogin.php?r=value'>Inicio de sesión</a>");
        die();
    }
?>  
