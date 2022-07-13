<?php
    session_start();
    $sesion=$_SESSION['usuario'];

    if($sesion!=null){
        include_once('../modelo/Solicitante.php');
        $s = new Solicitante;
        $codigo = $s -> getAutoIncrement();
        $nombre = $_POST['txtNombreSolicitante'];
        
        $email=$_POST['txtCorreo'];
        $telefono=$_POST['txtTelefono'];
        
        //PARA EL ARCHIVO DE IMAGEN
        $ext = end(explode(".", $_FILES['foto']['name'])); 
        $nombre_imagen = "$codigo.$ext";
        $temporal = $_FILES['foto']['tmp_name'];
        $carpeta = '../img/solicitante';
        $ruta_foto = $carpeta.'/'.$nombre_imagen;
        //echo $ruta_foto;
        
        if(isset($nombre) && isset($email) && isset($telefono) && isset($temporal)){
            if(move_uploaded_file($temporal, $ruta_foto)){
            
            $registrar = $s -> registrarSolicitante($nombre, $email, $telefono, $ruta_foto);
            if($registrar){
                echo json_encode('true');
            }else{
                echo json_encode('false');
            }
            }else{
                echo json_encode('noupload');
            }
        }
        
    }else{
        include_once('../vista/FrmMensaje.php');
        frmMensajeShow("<p class='p'>Acceso Denegado, no ha iniciado sesión<p>","<a class='link-p' href='../controlador/CtrlShowLogin.php?r=value'>Inicio de sesión</a>");
        die();
    }
    
    
?>