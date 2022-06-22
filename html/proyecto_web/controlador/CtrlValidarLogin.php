<?php
    $boton=$_POST['btnIngresar'];
    if(isset($boton)){
        include_once('../modelo/Usuario.php');
        $usuario=trim($_POST['txtUsuario']);
        $password=trim($_POST['txtPassword']);
        $result=validarUsuario($usuario,$password);
        if($result){
            session_start();
            $_SESSION['usuario']=$usuario;
            include_once('../vista/FrmMenuPrincipal.php');
            frmMenuPrincipalShow();
        }else{
            include_once('../vista/FrmMensaje.php');
            frmMensajeShow("No se pudo ingresar, intente nuevamente","<a href='../controlador/CtrlShowLogin.php'>Inicio de sesión</a>");
        }
    }else{
        include_once('frmMensaje.php');
        frmMensajeShow("Acceso Denegado, ingrese por el inicio de sesión","<a href='../controlador/CtrlShowLogin.php'>Inicio de sesión</a>");
    }
?>