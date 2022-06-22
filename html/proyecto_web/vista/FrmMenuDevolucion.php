<?php
    function frmMenuDevolucionShow(){
    ?>
        <!doctype html>
        <html>
        <head>
        <meta charset="utf-8">
            <link rel="stylesheet" href="../css/style.css">
        <title>Gestión de Devoluciones</title>
        </head>
        
        <body>
            <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
        <h1 align="center">Gestión de Devoluciones</h1>
            <div class="div-menu" align="center">
                <a class="button-menu2" href="../controlador/CtrlShowRegistrarDevolucion.php">Registrar Devolución</a><br>
                <a class="button-menu2" href="../controlador/CtrlShowVerDevoluciones.php">Registro de Devoluciones</a>
            </div>
            
            <a class="back" href="../controlador/CtrlShowMenuPrincipal.php">&lt; Volver al Menú Principal</a>
        </body>
        </html>
    <?php
    }
?>  

