<?php
    class FrmModificarArticulo
    {
        public function frmModificarArticuloShow(){
            ?>
            <!doctype html>
            <html>
            <head>
            <meta charset="utf-8">
            <link rel="stylesheet" href="../css/style.css">
            <title>Modificar Articulo</title>
            </head>

            <body>
            <div class="topPanel">
                <a class="back" href="../controlador/CtrlShowMenuArticulo.php">&lt; Volver al Menú</a>
                <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
            </div>
            <h1 align="center">Modificar Articulo</h1>
                <div class="div-buscar">
                    <form id="formBuscarArticulo" method="post">
                        <p class="txtFormBuscar">Buscar Código</p>
                        <input class="txtFieldForm" name="txtCodigoBuscar" type="text" id="txtCodigoBuscar">
                        <button class="button-search" type="submit" name="btnBuscar" id="btnBuscar">
                            <img class="icon-buscar" src="../img/icons/lupa.png">
                        </button>
                        <button type="button" class="button-ver" name="btnVerArticulos" id="btnVerArticulos" title="Ver Artículos" onClick="verArticulos()">
                            <img class="icon-menu" src="../img/icons/tabla.png">Ver Articulos
                        </button>
                        <p class="txtError" id="txtErrorCodigo">El código de artículo debe contener un número entre 1001 y 9999</p>
                    </form>
                </div>
                <hr class="hr">
                <form id="formModificarArticulo">
                    <div id="divForm" class="div-Form">

                    </div>
                </form>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="../js/validarDatosFormModificarArticulo.js"></script>
            </body>
            </html>
        <?php
        }
    }
    
?>

