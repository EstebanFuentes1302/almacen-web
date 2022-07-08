<?php
    session_start();
    $sesion=$_SESSION['usuario'];
    $action = $_POST['action'];

    if(!isset($action)){
        $action = '';
    }

    if($sesion!=null){
        include_once('../vista/FrmVerSolicitantes.php');
        include_once('../modelo/Solicitante.php');
        $s = new Solicitante;
        $solicitantes = $s -> getSolicitantes();
        
        if($action == 'popup'){
            $frm = new FrmVerSolicitantes;
            $frm -> frmVerSolicitantesPopUpShow($solicitantes);
        }else if($action == ''){
            $frm = new FrmVerSolicitantes;
            $frm -> frmVerSolicitantesShow($solicitantes);
        }
        
    }else{
        include_once('../vista/FrmMensaje.php');
        $frm = new FrmMensaje;
        $frm -> frmMensajeShow("<p class='p'>Acceso Denegado, no ha iniciado sesión<p>","<a class='link-p' href='../controlador/CtrlShowLogin.php?r=value'>Inicio de sesión</a>");
        die();
    }
?>  
