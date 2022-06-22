<?php
    session_start();
    $sesion=$_SESSION['usuario'];
    
    if($sesion!=null){
        include_once('../vista/FrmVerSolicitantes.php');
        include_once('../modelo/Solicitante.php');
        $solicitantes=getSolicitantes();
        frmVerSolicitantesShow($solicitantes);
    }else{
        include_once('../vista/FrmMensaje.php');
        frmMensajeShow("No es el acceso correcto","<a href='../vista/FrmMenu.php'>Volver Al Menú</a>");
    }
?>  
