<?php
    class FrmRegistrarPedido
    {
        public function frmRegistrarPedidoShow(){
            ?>
            <!doctype html>
            <html>
            <head>
            <meta charset="utf-8">
            <link rel="stylesheet" href="../css/style.css">
            <title>Registrar Pedido</title>
            </head>
            <body>
                <div class="topPanel">
                    <a class="back" href="../controlador/CtrlShowMenuPedido.php">&lt; Volver al Menú</a>
                    <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
                </div>

                <h1>Registrar Pedido</h1>
                <div class="div-Form">
                <form id="formRegistrarPedido" method="post">
                    <div class="div-form-row">
                        <div class="div-txt-form-row">
                            <span class="txtForm">Código de articulo</span>
                        </div>
                        <div class="div-input-form-row">
                            <input class="txtFieldForm" type="text" name="txtCodigoArticulo" id="txtCodigoArticulo">
                        </div>
                        <button class="button-search" type="button" name="btnBuscar" id="btnBuscar" onClick="buscarArticulo()">
                            <img class="icon-buscar" src="../img/icons/lupa.png">
                        </button>
                        <button type="button" class="button-ver" name="btnVerArticulos" id="btnVerArticulos" title="Ver Artículos" onClick="verArticulos()">
                            <img class="icon-menu" src="../img/icons/tabla.png">Ver Articulos
                        </button>
                    </div>
                    <p class="txtError" id="txtErrorCodigoArticulo">El código del artículo debe contener un número del 1001 al 9999</p>
                    <div id="divArticulo" class="div-form-row"></div>
                    <div class="div-form-row">
                        <div class="div-txt-form-row">
                            <span class="txtForm">Código de solicitante</span>
                        </div>
                        <div class="div-input-form-row">
                            <input class="txtFieldForm" type="text" name="txtCodigoSolicitante" id="txtCodigoSolicitante">
                        </div>
                        <button class="button-search" type="button" name="btnBuscar" id="btnBuscar" onClick="buscarSolicitante()">
                            <img class="icon-buscar" src="../img/icons/lupa.png">
                        </button>
                        <button type="button" class="button-ver" name="btnVerArticulos" id="btnVerArticulos" title="Ver Artículos" onClick="verSolicitantes()">
                            <img class="icon-menu" src="../img/icons/tabla.png">Ver Solicitantes
                        </button>
                    </div>
                    <p class="txtError" id="txtErrorCodigoSolicitante">El código de solicitante es un número de 8 dígitos y comienza con (1-9)</p>
                    <div id="divSolicitante" class="div-form-row"></div>
                    <div class="div-form-row">
                        <div class="div-txt-form-row">
                            <span class="txtForm">Cantidad</span>
                        </div>
                        <div class="div-input-form-row">
                            <input class="txtFieldForm" type="text" name="txtCantidad" id="txtCantidad">
                        </div>
                    </div>
                    <p class="txtError" id="txtErrorCantidad">La cantidad debe ser un número entero</p>
                    <div class="div-form-row">
                        <div class="div-txt-form-row">
                            <span class="txtForm">Estado</span>
                        </div>
                        <div class="div-input-form-row">
                            <select class="selectForm" name="sEstado" id="sEstado">
                                <option value="Entregado">Entregado</option>
                                <option value="Por Entregar">Por Entregar</option>
                            </select>
                        </div>
                    </div>
                    <div class="div-form-row">
                        <div class="div-txt-form-row">
                            <span class="txtForm">Fecha de registro</span>
                        </div>
                        <div class="div-input-form-row">
                            <input class="txtFieldForm" type="date" name="date" id="date">
                        </div>
                    </div>
                    
                    <p class="txtError" id="txtErrorFecha">La fecha está incompleta</p>
                    <input class="button-submit" type="submit" name="btnRegistrarPedido" id="btnRegistrarPedido" value="Registrar Pedido">
                    <input class="reset" type="reset" name="btnLimpiar" id="btnLimpiar" value="Limpiar">
                </form>    
                </div>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="../js/validarDatosFormRegistrarPedido.js"></script>
            </body>
            </html>
            <?php
        }
    }
?>


