<?php
    class FrmMenuSolicitante{
        public function frmMenuSolicitanteShow(){
        ?>
            <!doctype html>
            <html>
            <head>
            <meta charset="utf-8">
                <link rel="stylesheet" href="../css/style.css">
            <title>Gestión de Solicitantes</title>
            </head>

            <body>

            <div class="topPanel">
                <a class="back" href="../controlador/CtrlShowMenuPrincipal.php">&lt; Volver al Menú Principal</a>
                <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
            </div>
            <h1 align="center">Gestión de Solicitantes</h1>
            <hr class="hr">
            <div class="div-menu" align="center">
                <a class="button-menu2" href="../controlador/CtrlShowRegistrarSolicitante.php">
                    <div class="div-button-content">
                        <img class="icon-menu" src="../img/icons/registrar_solicitante.png">
                        <p class="txtButton">Registrar Solicitante</p>
                    </div>
                </a>
                <a class="button-menu2" href="../controlador/CtrlShowModificarSolicitante.php">
                    <div class="div-button-content">
                        <img class="icon-menu" src="../img/icons/modificar_solicitante.png">
                        <p class="txtButton">Modificar Solicitante</p>
                    </div>
                </a>
                <a class="button-menu2" href="../controlador/CtrlShowEliminarSolicitante.php">
                    <div class="div-button-content">
                        <img class="icon-menu" src="../img/icons/eliminar.png">
                        <p class="txtButton">Eliminar Solicitante</p>
                    </div>
                </a>
                <a class="button-menu2" href="../controlador/CtrlShowVerSolicitantes.php">
                    <div class="div-button-content">
                        <img class="icon-menu" src="../img/icons/tabla.png">
                        <p class="txtButton">Registro de Solicitante</p>
                    </div>
                </a>
            </div>
            </body>
            </html>
        <?php
        }
    }
    
?>  

