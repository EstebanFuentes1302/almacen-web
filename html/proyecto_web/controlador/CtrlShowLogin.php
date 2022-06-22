<?php
    session_start();
    $sesion=$_SESSION['usuario'];
    if($sesion!=null){
        include_once('CtrlShowMenuPrincipal.php');
    }else{
        include_once('../vista/FrmLogin.php');
        frmLoginShow();
    }
        
?>