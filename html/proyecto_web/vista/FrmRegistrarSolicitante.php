<?php
class FrmRegistrarSolicitante
{
    public function frmRegistrarSolicitanteShow(){
        ?>
        <!doctype html>
        <html>
        <head>
        <meta charset="utf-8">
            <link rel="stylesheet" href="../css/style.css">
        <title>Registrar Solicitante</title>
        </head>
        <body>
            <div class="topPanel">
                <a class="back" href="../controlador/CtrlShowMenuSolicitante.php">&lt; Volver al Menú</a>
                <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
            </div>
            <h1 align="center">Registrar Solicitante</h1>
            <hr class="hr">
            <form method="post" id="formRegistrarSolicitante" enctype="multipart/form-data">
                <div class="div-Form">
                    <div class="div-form-row">
                        <div class="div-txt-form-row">
                            <p class="txtForm">Nombre</p>
                        </div>
                        <div class="div-input-form-row">
                            <input class="txtFieldForm" type="text" name="txtNombreSolicitante" id="txtNombreSolicitante">
                        </div>
                    </div>
                    <p class="txtError" id="txtErrorNombre">El nombre del solicitante debe contener al menos 2 dígitos</p>
                    <div class="div-form-row">
                        <div class="div-txt-form-row">
                            <p class="txtForm">Correo Electrónico</p>
                        </div>
                        <div class="div-input-form-row">
                            <input class="txtFieldForm" type="email" name="txtCorreo" id="txtCorreo">
                        </div>
                    </div>
                    <p class="txtError" id="txtErrorCorreo">El formato del correo es incorrecto (ejemplo: alonso.peves@hot.com)</p>
                    <div class="div-form-row">
                        <div class="div-txt-form-row">
                            <p class="txtForm">Teléfono</p>
                        </div>
                        <div class="div-input-form-row">
                            <input class="txtFieldForm" type="text" name="txtTelefono" id="txtTelefono">
                        </div>
                    </div>
                    <p class="txtError" id="txtErrorTelefono">El número de celular debe contener 9 dígitos y empezar con 9</p>
                    <div class="div-form-row">
                        <div class="div-txt-form-row">
                            <p class="txtForm">Foto</p>
                        </div>
                        <div class="div-input-form-row">
                            <input class="fileForm" type="file" name="foto" id="foto">
                        </div>
                    </div>
                    <p class="txtError" id="txtErrorFoto">La foto debe ser en formato jpg, jpeg o png</p>
                    <input class="button-submit" type="submit" name="btnRegistrarSolicitante" id="btnRegistrarSolicitante" value="Registrar Solicitante">
                    <input class="reset" type="reset" name="btnLimpiar" id="btnLimpiar" value="Limpiar">
                </div>
            </form>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="../js/validarDatosFormRegistrarSolicitante.js"></script>
        </body>
        </html>
        <?php
    }
}
    
?>


