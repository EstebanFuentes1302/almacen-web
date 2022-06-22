<?php
    session_start();
    $sesion=$_SESSION['usuario'];
    
    if($sesion!=null){
        $codigo=$_POST['codigo'];
        $nombre=$_POST['nombre'];
        $cantidad=$_POST['cantidad'];
        if(isset($nombre) && isset($cantidad) && isset($codigo)){
            include_once('../modelo/Articulo.php');
            $result=modificarArticulo($codigo,$nombre,$cantidad,$fecha);
            if($result){
                echo json_encode('true');
            }else{
                echo json_encode('false');
            }
        }else{
            include_once('../vista/FrmMensaje.php');
            frmMensajeShow("No es el acceso correcto","<a href='../controlador/CtrlShowMenuArticulo.php?r=value>Volver Al Menú</a>");
        }
    }else{
        include_once('../vista/FrmMensaje.php');
        frmMensajeShow("Acceso Denegado, no ha iniciado sesión","<a href='../controlador/CtrlShowLogin.php?r=value'>Inicio de sesión</a>");
        die();
    }