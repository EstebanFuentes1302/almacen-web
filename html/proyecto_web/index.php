<?php
    session_start();
    $sesion = $_SESSION['usuario'];
    if($sesion!=null){
        include_once('vista/FrmMenuPrincipal.php');
        $frm = new FrmMenuPrincipal;
        $frm -> frmMenuPrincipalShow();
    }else{
        include_once('vista/FrmLogin.php');
        $frm = new FrmLogin;
        $frm -> frmLoginShow();
    } 
?> 