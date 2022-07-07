<?php
    class FrmMenuPedido
    {
        public function frmMenuPedidoShow(){
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
            <h1>Gestión de Pedidos</h1>
            <hr class="hr">
            <div class="div-menu" align="center">

                <a class="button-menu2" href="../controlador/CtrlShowRegistrarPedido.php">Registrar Pedido</a><br>
                <a class="button-menu2" href="../controlador/CtrlShowModificarPedido.php">Modificar Pedido</a><br>
                <a class="button-menu2" href="../controlador/CtrlShowEliminarPedido.php">Eliminar Pedido</a><br>
                <a class="button-menu2" href="../controlador/CtrlShowVerPedidos.php">Registro de Pedidos</a><br>
            </div>
            </body>
            </html>
        <?php
        }
    }
    
?>  

