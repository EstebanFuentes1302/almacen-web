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
            <div class="div-menu">

                <a class="button-menu2" href="../controlador/CtrlShowRegistrarPedido.php">
                    <img class="icon-menu" src="../img/icons/registrar_pedido.png">
                    <p class="txtButton">Registrar Pedido</p>
                </a>
                <a class="button-menu2" href="../controlador/CtrlShowModificarPedido.php">
                    <div class="div-button-content">
                        <img class="icon-menu" src="../img/icons/modificar_pedido.png">
                        <p class="txtButton">Modificar Pedido</p>
                    </div>
                </a>
                <!--<a class="button-menu2" href="../controlador/CtrlShowEliminarPedido.php">
                    <img class="icon-menu" src="../img/icons/eliminar.png">
                    Eliminar Pedido
                </a>-->
                <a class="button-menu2" href="../controlador/CtrlShowVerPedidos.php">
                    <div class="div-button-content">
                        <img class="icon-menu" src="../img/icons/tabla.png">
                        <p class="txtButton">Registro de Pedidos</p>
                    </div>
                </a>
            </div>
            </body>
            </html>
        <?php
        }
    }
    
?>  

