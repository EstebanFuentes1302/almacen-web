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
                        <div class="div-button-content">
                            <img class="icon-menu" src="../img/icons/registrar.png">
                            <p class="txtButton">Registrar Artículo</p>
                        </div>
                    </a>
                    <a class="button-menu2" href="../controlador/CtrlShowModificarArticulo.php">
                        <div class="div-button-content">
                            <img class="icon-menu" src="../img/icons/modificar.png">
                            <p class="txtButton">Modificar Artículo</p>
                        </div>
                    </a>
                    <a class="button-menu2" href="../controlador/CtrlShowEliminarArticulo.php">
                        <div class="div-button-content">
                            <img class="icon-menu" src="../img/icons/eliminar.png">
                            <p class="txtButton">Eliminar Artículo</p>
                        </div>
                    </a>
                    <a class="button-menu2" href="../controlador/CtrlShowVerArticulos.php">
                        <div class="div-button-content">
                            <img class="icon-menu" src="../img/icons/tabla.png">
                            <p class="txtButton">Registro de Artículos</p>
                        </div>
                    </a>
                </div>
                </body>
                </html>
            <?php
        }
    }
    
?>  

