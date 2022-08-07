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
                <form id="formRegistrarPedido" method="post">
                    <div class="div-container">
                        <div class="div-float-col ">
                            <div class="div-column background-gray">
                                <h1 class="h1-inside">Artículos</h1>
                                <div class="div-form-row">
                                    <div class="div-txt-form-row">
                                        <span class="txtForm">Código de articulo</span>
                                    </div>
                                    <div class="div-input-form-row div-input-form-row-medium">
                                        <input class="txtFieldForm txtFieldMedium" type="text" name="txtCodigoArticulo" id="txtCodigoArticulo">
                                    </div>
                                    <div class="div-txt-form-row div-txt-form-row-small">
                                        <span class="txtForm">Cantidad</span>
                                    </div>
                                    <div class="div-input-form-row div-input-form-row-small">
                                        <input class="txtFieldForm txtFieldShort" type="text" name="txtCantidadArticulo" id="txtCantidadArticulo">
                                    </div>
                                    <button class="button-search" type="button" name="btnBuscar" id="btnBuscar" onClick="buscarArticulo()">
                                        <img class="icon-buscar" src="../img/icons/lupa.png">
                                    </button>
                                </div>
                                <p class="txtError" id="txtErrorCodigoArticulo">El código del artículo debe contener un número del 1001 al 9999</p>
                                <p class="txtError" id="txtErrorCantidad">La cantidad ingresada es incorrecta</p>
                                <div class="div-form-row">
                                    <button type="button" class="button-ver" name="btnVerArticulos" id="btnVerArticulos" title="Ver Artículos" onClick="verArticulos()">
                                        <img class="icon-menu" src="../img/icons/tabla.png">Ver Articulos
                                    </button>
                                </div>
                                
                                <div id="divArticulo" class="div-form-row">
                                    <table id="tblArticulos" class="tblShow">
                                        <tbody id="tbodyArticulos">
                                            <tr>
                                              <th class="txtHeader">Código</th>
                                              <th class="txtHeader">Nombre</th>
                                              <th class="txtHeader">Cantidad</th>
                                              <th class="txtHeader" width="150px">Fecha de Registro</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                        <div class="div-float-col">
                            <div class="div-column background-gray">
                                <h1 class="h1-inside">Pedido</h1>
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
                                </div>
                                <p class="txtError" id="txtErrorCodigoSolicitante">El código de solicitante es un número de 8 dígitos y comienza con (1-9)</p>
                                <div class="div-form-row">
                                    <button type="button" class="button-ver" name="btnVerArticulos" id="btnVerArticulos" title="Ver Artículos" onClick="verSolicitantes()">
                                        <img class="icon-menu" src="../img/icons/tabla.png">Ver Solicitantes
                                    </button>    
                                </div>
                                <div id="divSolicitante" class="div-form-row">
                                    <table id="tblSolicitante" class="tblShow">
                                        <tbody id="tbodySolicitante">
                                            <tr>
                                              <th class="txtHeader">Código</th>
                                              <th class="txtHeader">Nombre</th>
                                              <th class="txtHeader">Correo Electrónico</th>
                                              <th class="txtHeader">Teléfono</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
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
                            </div>
                            
                        </div>
                    </div>
                    
                    
                    
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


