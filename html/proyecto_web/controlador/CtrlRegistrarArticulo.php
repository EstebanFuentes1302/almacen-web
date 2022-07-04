<?php
    session_start();
    $sesion=$_SESSION['usuario'];
    //$boton=$_POST['btnRegistrarArticulo'];
    
    if($sesion!=null){
        $nombre_articulo=$_POST['nombre'];
        $cantidad=$_POST['cantidad'];
        $fecha=str_replace("/","-",$_POST['fecha']);
        
        if(isset($nombre_articulo) and isset($cantidad) and isset($fecha)){
            include_once('../modelo/Articulo.php');
            $registrar=registrarArticulo($nombre_articulo,$cantidad,$fecha);
            
            if($registrar){
                echo json_encode('true');
                /*include_once('../vista/FrmMensajeAprobado.php');
                frmMensajeAprobadoShow("Artículo Agregado","El artículo fue agregado exitosamente",array("<a href='../controlador/CtrlShowRegistrarArticulo.php'>Agregar otro artículo</a>","<a href='../controlador/CtrlShowMenuArticulo.php'>Volver Al Menú</a>"));*/
            }else{
                echo json_encode('false');
                /*include_once('../vista/FrmMensaje.php');
                frmMensajeShow("No se pudo registrar el artículo","<a href='../controlador/CtrlShowRegistrarArticulo.php'>Intentar Nuevamente</a>");*/
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