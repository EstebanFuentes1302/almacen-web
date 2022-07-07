<?php
    class FrmMenuArticulo
    {
        public function frmMenuArticuloShow(){
            ?>
                <!doctype html>
                <html>
                <head>
                <meta charset="utf-8">
                    <link rel="stylesheet" href="../css/style.css">
                <title>Gestión de Almacén</title>
                </head>

                <body>
                <div class="topPanel">
                        <a class="back" href="../controlador/CtrlShowMenuPrincipal.php">&lt; Volver al Menú Principal</a>
                        <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a> 
                </div>
                <h1 align="center">Gestión de Artículos</h1>
                <hr class="hr">
                <div class="div-menu" align="center">
                    <a class="button-menu2" href="../controlador/CtrlShowRegistrarArticulo.php">
                        <img class="icon-menu" src="../img/icons/registrar.png">Registrar Artículo
                    </a>
                    <br>
                    <a class="button-menu2" href="../controlador/CtrlShowModificarArticulo.php">
                        <img class="icon-menu" src="../img/icons/modificar.png">
                        Modificar Artículo
                    </a>
                    <br>
                    <a class="button-menu2" href="../controlador/CtrlShowEliminarArticulo.php">
                        <img class="icon-menu" src="../img/icons/eliminar.png">
                        Eliminar Artículo
                    </a>
                    <br>
                    <a class="button-menu2" href="../controlador/CtrlShowVerArticulos.php">
                        <img class="icon-menu" src="../img/icons/tabla.png">
                        Registro de Artículos
                    </a>
                    <br>
                </div>
                </body>
                </html>
            <?php
        }
    }
    
?>  

