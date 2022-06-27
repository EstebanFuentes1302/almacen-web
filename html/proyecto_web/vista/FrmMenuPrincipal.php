<?php
    function frmMenuPrincipalShow(){
    ?>
        <html>
        <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/style.css">
        <title>Menú Principal</title>
        </head>
        <body>
            <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
            <h1 class="h1-left">MENÚ PRINCIPAL</h1>
            <div class="div-menu" align="center">
                <div>
                </div>
                <a class="button-menu" href="../controlador/CtrlShowMenuArticulo.php">Gestionar Articulos</a>
                <a class="button-menu" href="../controlador/CtrlShowMenuPedido.php">Gestionar Pedidos</a>
                <br>
                <a class="button-menu" href="../controlador/CtrlShowMenuDevolucion.php" name="btnMenuDevoluciones" id="btnMenuDevoluciones" value="Gestionar Devoluciones">Gestionar Devoluciones</a>
                <a class="button-menu" href="../controlador/CtrlShowMenuSolicitante.php">Gestionar Solicitantes</a>
            </div>
        </body>
        </html>   
    <?php
    }

?>

<!doctype html>
