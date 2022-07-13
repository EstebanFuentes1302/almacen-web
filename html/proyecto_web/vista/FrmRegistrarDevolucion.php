<?php
    class FrmRegistrarDevolucion{
        public function frmRegistrarDevolucionShow(){
            ?>
            <!doctype html>
            <html>
            <head>
            <meta charset="utf-8">
            <link rel="stylesheet" href="../css/style.css">
            <title>Registrar Devolución</title>
            </head>

            <body>
                <div class="topPanel">
                    <a class="back" href="../controlador/CtrlShowMenuDevolucion.php">&lt; Volver Al Menú</a>
                    <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
                </div>
            <h1 align="center">Devolver Pedido</h1>
                <form id="formBuscarDevolucion">
                    <div class="div-buscar">
                        <p class="txtFormBuscar">Buscar Pedido</p>
                        <input class="txtFieldForm"  name="txtCodigoBuscar" type="text" id="txtCodigoBuscar" placeholder="Código de Pedido">
                        <button class="button-search" id="btnBuscar" class="button-submit" type="submit">
                            <img class="icon-buscar" src="../img/icons/lupa.png">
                        </button>
                        <button type="button" class="button-ver" name="btnVerPedidos" id="btnVerPedidos" title="Ver Pedidos" onClick="verPedidos()">
                            <img class="icon-menu" src="../img/icons/tabla.png">Ver Pedidos
                        </button>
                    </div>
                    <p class="txtError" id="txtErrorCodigo">El código de pedido debe contener un número entre 1001 y 9999</p>
                </form>
                <hr class="hr">
                <form id="formRegistrarDevolucion" method="post">
                    <div id="divDevolverPedido" class="div-Form"></div>
                </form>        
                <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="../js/validarDatosFormRegistrarDevolucion.js"></script>

            </body>
            </html>
        <?php
        }
    }
    
?>


