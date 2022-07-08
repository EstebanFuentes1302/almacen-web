<?php
    class FrmModificarSolicitante
    {
        public function frmModificarSolicitanteShow(){
            ?>
            <!doctype html>
            <html>
            <head>
            <meta charset="utf-8">
                <link rel="stylesheet" href="../css/style.css">
            <title>Modificar Solicitante</title>
            </head>

            <body>
                <div class="topPanel">
                    <a class="back" href="../controlador/CtrlShowMenuSolicitante.php">&lt; Volver al Menú</a>
                    <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
                </div>
            <h1 align="center">Modificar Solicitante</h1>
            <form id="formBuscarSolicitante" method="post">
                <div class="divForm">
                    <div class="div-form-row">
                        <div class="div-txt-form-row">
                            <p class="txtForm">Buscar Código</p>
                        </div>
                        <div class="div-input-form-row">
                            <input class="txtFieldForm" name="txtCodigoBuscar" type="text" id="txtCodigoBuscar">
                        </div>
                        <button class="button-search" type="submit" name="btnBuscar" id="btnBuscar">
                            <img class="icon-buscar" src="../img/icons/lupa.png">
                        </button>
                        <button type="button" class="button-ver" name="btnVerArticulos" id="btnVerArticulos" title="Ver Artículos" onClick="verSolicitantes()">
                            <img class="icon-menu" src="../img/icons/tabla.png">Ver Solicitantes
                        </button>
                    </div>
                </div>
                <p class="txtError" id="txtErrorCodigo">El código de solicitante debe tener 8 dígitos y comenzar con "2"</p>
            </form>
                <hr class="hr">
                <form id="formModificarSolicitante">
                    <div id="divModificarSolicitante" class="div-Form">
                    
                    </div>
                </form>    
                <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="../js/validarDatosFormModificarSolicitante.js"></script>
            </body>
            </html>
        <?php
        }
    }
    
?>

