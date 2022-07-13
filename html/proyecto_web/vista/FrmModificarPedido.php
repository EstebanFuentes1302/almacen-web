<?php
    class FrmModificarPedido
    {
        public function frmModificarPedidoShow(){
            ?>
            <!doctype html>
            <html>
            <head>
            <meta charset="utf-8">
                <link rel="stylesheet" href="../css/style.css">
            <title>Modificar Pedido</title>
            </head>

            <body>
                <div class="topPanel">
                    <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
                    <a class="back" href="../controlador/CtrlShowMenuPedido.php">&lt; Volver Al Menú</a>
                </div>
                <h1>Modificar Pedido</h1>
                <form id=formBuscarPedido method="post">
                    <div class="div-buscar">
                        <p class="txtFormBuscar">Buscar Código</p>
                       <input class=txtFieldForm name="txtCodigoBuscar" type="text" id="txtCodigoBuscar" placeholder="Código de Pedido">
                        <button class="button-search" type="button" name="btnBuscar" id="btnBuscar" onclick="buscarPedido()">
                                <img class="icon-buscar" src="../img/icons/lupa.png">
                        </button>
                        <button type="button" class="button-ver" name="btnVerPedidos" id="btnVerPedidos" title="Ver Pedidos" onClick="verPedidos()">
                            <img class="icon-menu" src="../img/icons/tabla.png">Ver Pedidos
                        </button>
                        <p class="txtError" id="txtErrorCodigo">El código de artículo debe contener un número entre 1001 y 9999</p>
                    </div>
                </form>
                <hr class="hr">
                
                    
                <form id="formModificarPedido">
                    <div id="divModificarPedido" class="div-Form"> 
                    </div>
                </form>
                

                <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="../js/validarDatosFormModificarPedido.js"></script>
            </body>
            </html>
        <?php
        }
    }
    
?>

