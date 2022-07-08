<?php
    class FrmEliminarPedido
    {
        public function frmEliminarPedidoShow(){
            ?>
            <!doctype html>
            <html>
            <head>
            <meta charset="utf-8">
            <link rel="stylesheet" href="../css/style.css">
            <title>Eliminar Pedido</title>
            </head>

            <body>
                <div class="topPanel">
                    <a class="back" href="../controlador/CtrlShowMenuPedido.php">&lt; Volver Al Menú</a>
                    <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
                </div>

            <h1 align="center">Eliminar Pedido</h1>
                <form id="formBuscarPedido">
                    <div class="div-buscar">
                        <p class="txtFormBuscar">Buscar Código</p>
                        <input class="txtFieldForm" name="txtCodigoBuscar" type="text" id="txtCodigoBuscar">
                        <button class="button-search" type="submit" name="btnBuscar" id="btnBuscar">
                            <img class="icon-buscar" src="../img/icons/lupa.png">
                        </button>
                        <button type="button" class="button-ver" name="btnVerArticulos" id="btnVerArticulos" title="Ver Artículos" onClick="verPedidos()">
                            <img class="icon-menu" src="../img/icons/tabla.png">Ver Pedidos
                        </button>
                  <p class="txtError" id="txtErrorCodigo">El código de artículo debe contener un número entre 1001 y 9999</p>
                </form>
                <hr class="hr">
                <div class="div-Form">
                    <form id="formEliminarPedido" method="post">
                        <div id="divEliminarPedido" class="div-Form">

                        </div>
                    </form> 
                </div>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="../js/validarDatosFormEliminarPedido.js"></script>
            </body>
            </html>
        <?php
        }        
    }
    
?>

