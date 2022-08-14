<?php
    class FrmRegistrarArticulo
    {
        public function frmRegistrarArticuloShow(){
            ?>
            <!doctype html>
            <html>
            <head>
            <meta charset="utf-8">
            <link rel="stylesheet" href="../css/style.css">
            <title>Registrar Artículo</title>
            </head>
            <body>
                <div class="topPanel">
                    <a class="back" href="../controlador/CtrlShowMenuArticulo.php">&lt; Volver al Menú</a>
                    <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
                </div>
                <h1 align="center">Registrar Artículo</h1>
                <hr class="hr">
                <div class="div-Form">
                    <form class="form-registrar-articulo" id="formRegistrarArticulo" method="post">
                        <div class="div-form-row">
                            <div class="div-txt-form-row">
                                <span class="txtForm">Nombre de artículo</span>
                            </div>
                            <div class="div-input-form-row">
                                <input class="txtFieldForm" type="text" name="txtNombreArticulo" id="txtNombreArticulo">
                            </div>
                        </div>
                        <p class="txtError" id="txtErrorNombre">El nombre del artículo debe contener al menos 2 dígitos</p>
                        <p class="txtError" id="txtErrorNombreLength">La cantidad máxima de caracteres es de 50</p>
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
                                <span class="txtForm">Fecha de registro</span>
                            </div>
                            <div class="div-input-form-row">
                                <input class="dateForm" type="date" name="date" id="date">
                            </div>
                        </div>
                        <p class="txtError" id="txtErrorFecha">La fecha está incompleta</p>
                        <input class="button-submit" type="submit" name="btnRegistrarArticulo" id="btnRegistrarArticulo" value="Registrar Articulo">
                        <input class="reset" type="reset" name="btnLimpiar" id="btnLimpiar" value="Limpiar">
                    </form>
                    </div>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="../js/validarDatosFormRegistrarArticulo.js"></script>
            </body>
            </html>

            <?php
        }
    }
?>


