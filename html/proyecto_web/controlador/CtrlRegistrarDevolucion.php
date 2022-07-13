<?php
    session_start();
    $sesion=$_SESSION['usuario'];
    $codigo = $_POST['codigo'];
    $cantidad= $_POST['cantidad'];
    $codigo_articulo = $_POST['codigo_articulo'];
    if($sesion!=null){
        if(isset($codigo) && isset($cantidad) && isset($codigo_articulo)){
            include_once('../modelo/Pedido.php');
            include_once('../modelo/Devolucion.php');
            $d = new Devolucion;
            $p = new Pedido;
            $dev = $p -> isDevuelto($codigo);
            if($dev == false){
                $fecha_devolucion=str_replace("/","-",$_POST['fecha_devolucion']);
                $detalles=$_POST['detalles'];
                $devolver = $p -> devolverPedido($codigo,$codigo_articulo,$cantidad);
                if($devolver){
                    $registrar = $d -> registrarDevolucion($codigo, $fecha_devolucion, $detalles);
                    if($registrar){
                        echo json_encode('true');
                    }else{
                        echo json_encode('false');
                    }
                }else{
                    echo json_encode('false');
                }    
            }else{
                echo json_encode('dev');
            }
        }else{
            include_once('../vista/FrmMensaje.php');
            frmMensajeShow("<p class='p'>No es el acceso correcto<p>","<a class='link-p'  href='../controlador/CtrlShowMenuDevolucion.php>Volver</a>");
            die();
        }
    }else{
        include_once('../vista/FrmMensaje.php');
        frmMensajeShow("Acceso Denegado, no ha iniciado sesión","<a href='../controlador/CtrlShowLogin.php?'>Inicio de sesión</a>");
        die();
    }
    
?>