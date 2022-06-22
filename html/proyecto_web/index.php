<?php
    session_start();
    $sesion = $_SESSION['usuario'];
    if($sesion!=null){
        include_once('vista/FrmMenuPrincipal.php');
        frmMenuPrincipalShow();
    }else{
        include_once('vista/FrmLogin.php');
        frmLoginShow();
    } 
?> 