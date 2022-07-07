<?php
    class FrmMenuPrincipal
    {
        public function frmMenuPrincipalShow(){
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
                    <a class="button-menu" href="../controlador/CtrlShowMenuArticulo.php">
                        <img class="icon-menu-principal" src="../img/icons/articulo.png">
                        Gestionar<br>Articulos
                    </a>
                    <a class="button-menu" href="../controlador/CtrlShowMenuPedido.php">
                        <img class="icon-menu-principal" src="../img/icons/pedido.png">
                        Gestionar<br>Pedidos
                    </a>
                    <br>
                    <a class="button-menu" href="../controlador/CtrlShowMenuDevolucion.php" name="btnMenuDevoluciones" id="btnMenuDevoluciones" value="Gestionar Devoluciones">
                        <img class="icon-menu-principal" src="../img/icons/devolucion.png">
                        Gestionar<br>Devoluciones
                    </a>
                    <a class="button-menu" href="../controlador/CtrlShowMenuSolicitante.php">
                        <img class="icon-menu-principal" src="../img/icons/solicitante.png">
                        Gestionar<br>Solicitantes
                    </a>
                </div>
            </body>
            </html>   
        <?php
        }
    }
    

?>

<!doctype html>
