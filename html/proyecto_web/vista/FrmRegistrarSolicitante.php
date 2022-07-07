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
            <form method="post" id="formRegistrarSolicitante" enctype="multipart/form-data"><table width="652" border="0" align="center">
          <tbody>
            <tr>
              <td width="184" height="41" align="center" valign="middle" class="txtForm">Nombre</td>
              <td width="458" align="center" valign="middle"><input class="txtFieldForm" type="text" name="txtNombreSolicitante" id="txtNombreSolicitante"></td>
              </tr>
          <tr>
              <td height="0" colspan="2" align="center" valign="middle"><p class="txtError" id="txtErrorNombre">El nombre del solicitante debe contener al menos 2 dígitos</p></td>
            </tr>
            <tr>
              <td class="txtForm" height="32" align="center" valign="middle">Correo Electrónico</td>
              <td align="center" valign="middle"><input class="txtFieldForm" type="email" name="txtCorreo" id="txtCorreo"></td>
            </tr>
            <tr>
              <td height="0" colspan="2" align="center" valign="middle"><p class="txtError" id="txtErrorCorreo">El formato del correo es incorrecto (ejemplo: alonso.peves@hot.com)</p></td>
            </tr>
            <tr>
              <td class="txtForm"  height="47" align="center" valign="middle">Teléfono</td>
              <td align="center" valign="middle"><input class="txtFieldForm" type="text" name="txtTelefono" id="txtTelefono"></td>
            </tr>
            <tr>
              <td height="0" colspan="2" align="center" valign="middle"><p class="txtError" id="txtErrorTelefono">El número de celular debe contener 9 dígitos y empezar con 9</p></td>
            </tr>
            <tr>
              <td class="txtForm"  height="42" align="center" valign="middle">Foto</td>
              <td align="center" valign="middle"><input class="fileForm" type="file" name="foto" id="foto"></td>
            </tr>
            <tr>
              <td height="0" colspan="2" align="center" valign="middle"><p class="txtError" id="txtErrorFoto">La foto debe ser en formato jpg, jpeg o png</p></td>
            </tr>
            <tr>
              <td height="47" colspan="2" align="center" valign="middle">
                   <input class="button-submit" type="submit" name="btnRegistrarSolicitante" id="btnRegistrarSolicitante" value="Registrar Solicitante"><br>
                    <input class="reset" type="reset" name="btnLimpiar" id="btnLimpiar" value="Limpiar">
                </td>
              </tr>
            </tbody>
        </table>
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


