<?php
    session_start();
    $sesion=$_SESSION['usuario'];
    
    if($sesion!=null){
        $codigo=$_POST['codigo'];
        $nombre=$_POST['nombre'];
        $cantidad=$_POST['cantidad'];
        if(isset($nombre) && isset($cantidad) && isset($codigo)){
            include_once('../modelo/Articulo.php');
            $a = new Articulo;
            $result = $a -> modificarArticulo($codigo, $nombre, $cantidad, $fecha);
            if($result){
                echo json_encode('true');
            }else{
                echo json_encode('false');
            }
        }else{
            include_once('../vista/FrmMensaje.php');
            frmMensajeShow("<p class='p'>No es el acceso correcto<p>","<a class='link-p'  href='../controlador/CtrlShowMenuArticulo.php?r=value>Volver</a>");
            die();
        }
    }else{
        include_once('../vista/FrmMensaje.php');
        frmMensajeShow("<p class='p'>Acceso Denegado, no ha iniciado sesión<p>","<a class='link-p' href='../controlador/CtrlShowLogin.php?r=value'>Inicio de sesión</a>");
        die();
    }