<?php
    session_start();
    $sesion=$_SESSION['usuario'];
    $action = $_POST['action'];
    if(!isset($action)){
        $action = '';
    }

    if($sesion!=null){
        include_once('../vista/FrmVerDevoluciones.php');
        include_once('../modelo/Devolucion.php');
        
        $d = new Devolucion;
        $devoluciones = $d -> getDevoluciones();
        if($action == 'popup'){
            $frm = new FrmVerDevoluciones;
            $frm -> frmVerDevolucionesPopUpShow($devoluciones);
        }else if($action == ''){
            $frm = new FrmVerDevoluciones;
            $frm -> frmVerDevolucionesShow($devoluciones);
        }
        
    }else{
        include_once('../vista/FrmMensaje.php');
        $frm = new FrmMensaje;
        $frm -> frmMensajeShow("<p class='p'>Acceso Denegado, no ha iniciado sesión<p>","<a class='link-p' href='../controlador/CtrlShowLogin.php?r=value'>Inicio de sesión</a>");
        die();
    }
    
    
?>  
