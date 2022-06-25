<?php
    session_start();
    $sesion=$_SESSION['usuario'];

    if($sesion!=null){
            include_once('../modelo/Articulo.php');
            $codigo=$_POST['codigo'];
            $articulo=buscarArticulo($codigo);
            if($articulo){
                $json = array(
                        'codigo' => $articulo['codigo'],
                        'nombre' => $articulo['nombre'],
                        'cantidad' => $articulo['cantidad'],
                        'fecha_registro' => $articulo['fecha_registro']
                    );
                $jsonstring = json_encode($json);
                echo $jsonstring;
            }else{
                echo json_encode('false');
            }
    }else{
        include_once('../vista/FrmMensaje.php');
        frmMensajeShow("<p class='p'>Acceso Denegado, no ha iniciado sesión<p>","<a class='link-p' href='../controlador/CtrlShowLogin.php?r=value'>Inicio de sesión</a>");
        die();
    }
