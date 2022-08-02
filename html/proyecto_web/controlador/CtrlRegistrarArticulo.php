<?php
    session_start();
    $sesion=$_SESSION['usuario'];
    
    if($sesion != null){
        $nombre_articulo=$_POST['nombre'];
        $cantidad=$_POST['cantidad'];
        $fecha=str_replace("/","-",$_POST['fecha']);
       
        if(isset($nombre_articulo) && isset($cantidad) && isset($fecha)){
            include_once('../modelo/Articulo.php');
            $a = new Articulo;
            $registrar = $a -> registrarArticulo($nombre_articulo, $cantidad, $fecha);
            if($registrar){
                echo json_encode('true');
            }else{
                echo json_encode('false');
            }
        }else{
            include_once('../vista/FrmMensaje.php');
            frmMensajeShow("<p class='p'>No es el acceso correcto<p>","<a class='link-p'  href='../controlador/CtrlShowMenuArticulo.php>Volver</a>");
            die();
        }
    }else{
        include_once('../vista/FrmMensaje.php');
        frmMensajeShow("<p class='p'>Acceso Denegado, no ha iniciado sesión<p>","<a class='link-p' href='../controlador/CtrlShowLogin.php?r=value'>Inicio de sesión</a>");
        die();
    }
    
    
?>