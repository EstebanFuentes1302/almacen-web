<?php
    class FrmEliminarSolicitante
    {
        public function frmEliminarSolicitanteShow(){
            ?>
            <!doctype html>
            <html>
            <head>
            <meta charset="utf-8">
            <link rel="stylesheet" href="../css/style.css">
            <title>Eliminar Solicitante</title>
            </head>

            <body>
                <div class="topPanel">
                    <a class="back" href="../controlador/CtrlShowMenuSolicitante.php">&lt; Volver al Menú</a>
                    <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
                </div>
                <h1 align="center">Eliminar Solicitante</h1>
                <form id="formBuscarSolicitante" method="post">
                    <div class="div-buscar">
                        <p class="txtFormBuscar">Buscar Código</p>
                        <input class="txtFieldForm" name="txtCodigoBuscar" type="text" id="txtCodigoBuscar">
                        <button class="button-search" type="submit" name="btnBuscar" id="btnBuscar">
                                    <img class="icon-buscar" src="../img/icons/lupa.png">
                        </button>
                        <button type="button" class="button-ver" name="btnVerArticulos" id="btnVerArticulos" title="Ver Artículos" onClick="verSolicitantes()">
                                <img class="icon-menu" src="../img/icons/tabla.png">Ver Solicitantes
                        </button>
                        <p class="txtError" id="txtErrorCodigo">El código de solicitante debe tener 8 dígitos y comenzar con "2"</p>
                    </div>
                </form>
            <hr class="hr">
            <div class="div-Form">
                <form id="formEliminarSolicitante" method="post">
                <div class="div-Form" id="divSolicitante"></div>
                </form>    
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="../js/validarDatosFormEliminarSolicitante.js"></script>
            </body>
            </html>
        <?php
        }    
    }
    
?>

