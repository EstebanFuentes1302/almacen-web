<?php
    class FrmMenuDevolucion
    {
        public function frmMenuDevolucionShow(){
        ?>
            <!doctype html>
            <html>
            <head>
            <meta charset="utf-8">
                <link rel="stylesheet" href="../css/style.css">
            <title>Gestión de Devoluciones</title>
            </head>

            <body>
            <div class="topPanel">
                <a class="back" href="../controlador/CtrlShowMenuPrincipal.php">&lt; Volver al Menú Principal</a>
                <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
            </div>
            <h1 align="center">Gestión de Devoluciones</h1>
            <hr class="hr">
            <div class="div-menu" align="center">
                <a class="button-menu2" href="../controlador/CtrlShowRegistrarDevolucion.php">
                    <img class="icon-menu" src="../img/icons/devolver.png">
                    <p class="txtButton">Devolver Pedido</p>
                </a>
                <a class="button-menu2" href="../controlador/CtrlShowVerDevoluciones.php">
                    <div class="div-button-content">
                        <img class="icon-menu" src="../img/icons/tabla.png">
                        <p class="txtButton">Registro de Devoluciones</p>
                    </div>
                </a>
            </div>
            </body>
            </html>
        <?php
        }    
    }
    
?>  

