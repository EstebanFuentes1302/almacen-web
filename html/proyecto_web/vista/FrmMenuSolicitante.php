<?php
    function frmMenuSolicitanteShow(){
    ?>
        <!doctype html>
        <html>
        <head>
        <meta charset="utf-8">
            <link rel="stylesheet" href="../css/style.css">
        <title>Gestión de Solicitantes</title>
        </head>

        <body>
        
        <div class="topPanel">
            <a class="back" href="../controlador/CtrlShowMenuPrincipal.php">&lt; Volver al Menú Principal</a>
            <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
        </div>
        <h1 align="center">Gestión de Solicitantes</h1>
        <hr class="hr">
        <div class="div-menu" align="center">
            <a class="button-menu2" href="../controlador/CtrlShowRegistrarSolicitante.php">Registrar Solicitante</a><br>
            <a class="button-menu2" href="../controlador/CtrlShowModificarSolicitante.php">Modificar Solicitante</a><br>
            <a class="button-menu2" href="../controlador/CtrlShowEliminarSolicitante.php">Eliminar Solicitante</a><br>
            <a class="button-menu2" href="../controlador/CtrlShowVerSolicitantes.php">Registro de Solicitante</a><br>
        </div>
        </body>
        </html>
    <?php
    }
?>  

