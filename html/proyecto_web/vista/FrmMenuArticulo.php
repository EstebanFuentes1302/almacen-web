<?php
    function frmMenuArticuloShow(){
    ?>
        <!doctype html>
        <html>
        <head>
        <meta charset="utf-8">
            <link rel="stylesheet" href="../css/style.css">
        <title>Gestión de Almacén</title>
        </head>

        <body>
        <div class="topPanel">
                <a class="back" href="../controlador/CtrlShowMenuPrincipal.php">&lt; Volver al Menú Principal</a>
                <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a> 
        </div>
        <h1 align="center">Gestión de Artículos</h1>
        <hr class="hr">
        <div class="div-menu" align="center">
            <a class="button-menu2" href="../controlador/CtrlShowRegistrarArticulo.php">Registrar Artículo</a><br>
            <a class="button-menu2" href="../controlador/CtrlShowModificarArticulo.php">Modificar Artículo</a><br>
            <a class="button-menu2" href="../controlador/CtrlShowEliminarArticulo.php">Eliminar Artículo</a><br>
            <a class="button-menu2" href="../controlador/CtrlShowVerArticulos.php">Registro de Artículos</a><br>
        </div>
        </body>
        </html>
    <?php
    }
?>  

