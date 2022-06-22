<?php
    session_start();
    $sesion=$_SESSION['usuario'];
    $boton=$_POST['btnRegistrarSolicitante'];

    if($sesion!=null){
        if(isset($boton) or isset($_GET['r'])){
            $nombre=$_POST['txtNombre'];
            $email=$_POST['txtCorreo'];
            $telefono=$_POST['txtTelefono'];
            
            //PARA EL ARCHIVO DE IMAGEN
            $nombre_imagen=$_FILES['foto']['name'];
            $temporal=$_FILES['foto']['tmp_name'];
            $carpeta='../img';
            $ruta_foto=$carpeta.'/'.$nombre_imagen;
            if(move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen)){
                include_once('../modelo/Solicitante.php');
                $registrar=registrarSolicitante($nombre,$email,$telefono,$ruta_foto);
                if($registrar){
                    include_once('../vista/FrmMensajeAprobado.php');
                    frmMensajeAprobadoShow("Solicitante Registrado","El solicitante fue registrado exitosamente",array("<a href='../controlador/CtrlShowRegistrarSolicitante.php'>Registrar otro solicitante</a>","<a href='../controlador/CtrlShowMenuSolicitante.php'>Volver Al Menú</a>"));
                }else{
                    include_once('../vista/FrmMensaje.php');
                    frmMensajeShow("No se pudo agregar al solicitante","<a href='../controlador/CtrlShowMenuSolicitante.php'>Volver Al Menú</a>");
                }
            }else{
                include_once('../vista/FrmMensaje.php');
                frmMensajeShow("No se pudo subir el archivo, iniciar sesión","<a href='../controlador/CtrlShowMenuSolicitante.php'>Volver Al Menú</a>");
            }
        }else{
            include_once('../vista/FrmMensaje.php');
            frmMensajeShow("No es el acceso correcto, iniciar sesión","<a href='../controlador/CtrlShowLogin.php?r=value'>Inicio de sesión</a>");
        }
    }else{
        include_once('../vista/FrmMensaje.php');
        frmMensajeShow("Acceso Denegado, no ha iniciado sesión","<a href='../controlador/CtrlShowLogin.php?r=value'>Inicio de sesión</a>");
        die();
    }
    
    
?>