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
                    Devolver Pedido
                </a>
                <br>
                <a class="button-menu2" href="../controlador/CtrlShowVerDevoluciones.php">
                    <img class="icon-menu" src="../img/icons/tabla.png">
                    Registro de Devoluciones
                </a>
            </div>
            </body>
            </html>
        <?php
        }    
    }
    
?>  

