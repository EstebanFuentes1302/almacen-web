<?php
    session_start();
    $sesion=$_SESSION['usuario'];

    if($sesion!=null){
        $codigo=$_POST['codigo'];
        if(isset($codigo)){
            include_once('../modelo/Solicitante.php');
            $used = isUsed($codigo);
            $result = eliminarSolicitante($codigo);
            if($used == false){
                if($result){
                echo json_encode("true");
                }else{
                    echo json_encode("false");
                }    
            }else{
                echo json_encode("used");
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