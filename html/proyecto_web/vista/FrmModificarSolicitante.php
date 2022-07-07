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
                  <table width="706" border="0" align="center">
                    <tbody>
                      <tr>
                        <td class="txtForm" width="157" height="35">Buscar Código</td>
                        <td width="539" align="center" valign="middle"><input class="txtFieldForm" name="txtCodigoBuscar" type="text" id="txtCodigoBuscar">
                          <input class="button-submit" type="submit" name="btnBuscar" id="btnBuscar" value="Buscar"></td>
                      </tr>
                    </tbody>
                  </table>
                    <p class="txtError" id="txtErrorCodigo">El código de solicitante debe tener 8 dígitos y comenzar con "2"</p>
                </form>
                <hr class="hr">
                <div class="div-Form">
                    <form id="formModificarSolicitante" method="post">
                    <table id="tblModificarSolicitante" width="462" border="0" align="center">
                    <tbody id="tbodyModificarSolicitante">
                      </tbody>
                        <tr>
                            <td colspan="2">
                                <p class="txtError" id="txtErrorNombre">El nombre debe tener 2 dígitos como mínimo</p>
                            </td>
                        </tr>
                    <tbody id="tbodyModificarSolicitante2">
                      </tbody>
                        <tr>
                            <td colspan="2">
                                <p class="txtError" id="txtErrorCorreo">El correo ingresado es incorrecto</p>
                            </td>
                        </tr>

                    <tbody id="tbodyModificarSolicitante3">
                      </tbody>
                        <tr>
                            <td colspan="2">
                                <p class="txtError" id="txtErrorTelefono">El teléfono debe tener 9 dígitos y comenzar con "9"</p>
                            </td>
                        </tr>

                    <tbody id="tbodyModificarSolicitante4">
                      </tbody>
                      </table>
                    </form>    
                </div>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="../js/validarDatosFormModificarSolicitante.js"></script>
            </body>
            </html>
        <?php
        }
    }
    
?>

