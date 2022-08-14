<?php
    session_start();
    $sesion=$_SESSION['usuario'];
    $codigo = $_GET['c'];
    if($sesion!=null && isset($codigo)){
       include_once('../vista/FrmVerProforma.php');
        $frm = new FrmVerProforma;
        $frm -> frmVerProformaShow($codigo);
    }else{
        include_once('../vista/FrmMensaje.php');
        $frm = new FrmMensaje;
        $frm -> frmMensajeShow("<p class='p'>Acceso Denegado, no ha iniciado sesión<p>","<a class='link-p' href='../controlador/CtrlShowLogin.php?r=value'>Inicio de sesión</a>");
        die();
    }
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
</body>
</html>