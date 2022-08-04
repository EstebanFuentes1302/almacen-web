<?php
    class FrmLogin
    {
        public function frmLoginShow(){
            ?>
            <!doctype html>
            <html>
            <head>
            <meta charset="utf-8">
            <link rel="stylesheet" href="../css/style.css">
            <title>Gestión de Almacén</title>
            </head>

            <body>
                <h1 align="center">Inicio de Sesión</h1>
                <form id="formIniciarSesion" method="post" action="../controlador/CtrlValidarLogin.php">
                    <div class="div-Form">
                        <div class="div-form-row">
                            <div class="div-txt-form-row">
                                <p class="txtForm">Usuario</p>
                            </div>
                            <div class="div-input-form-row">
                                <input class="txtFieldForm" type="text" name="txtUsuario" id="txtUsuario">
                            </div>
                        </div>
                        <div class="div-form-row">
                            <div class="div-txt-form-row">
                                <p class="txtForm">Contraseña</p>
                            </div>
                            <div class="div-input-form-row">
                                <input class="txtFieldForm" type="password" name="txtPassword" id="txtPassword">
                            </div>
                        </div>
                    </div>
                    
                    <input type="submit" class="button-submit" name="btnIngresar" id="btnIngresar" value="Ingresar">
                </form>
                </body>
            </html>
        <?php
        }    
    }
    
?>

