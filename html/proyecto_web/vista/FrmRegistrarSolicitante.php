<?php
    function frmRegistrarSolicitanteShow(){
        ?>
        <!doctype html>
        <html>
        <head>
        <meta charset="utf-8">
            <link rel="stylesheet" href="../css/style.css">
        <title>Registrar Solicitante</title>
        </head>
        <body>
            <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
            <h1 align="center">Registrar Solicitante</h1>
            <form method="post" action="../controlador/CtrlRegistrarSolicitante.php" enctype="multipart/form-data"><table width="652" border="0" align="center" >
          <tbody>
            <tr>
              <td width="184" height="41" align="center" valign="middle" class="txtForm">Nombre</td>
              <td width="458" align="center" valign="middle"><input class="txtFieldForm" type="text" name="txtNombre" id="txtNombre"></td>
              </tr>
            <tr>
              <td class="txtForm" height="32" align="center" valign="middle">Correo Electrónico</td>
              <td align="center" valign="middle"><input class="txtFieldForm" type="email" name="txtCorreo" id="txtCorreo"></td>
            </tr>
            <tr>
              <td class="txtForm"  height="47" align="center" valign="middle">Teléfono</td>
              <td align="center" valign="middle"><input class="txtFieldForm" type="text" name="txtTelefono" id="txtTelefono"></td>
            </tr>
            <tr>
              <td class="txtForm"  height="42" align="center" valign="middle">Foto</td>
              <td align="center" valign="middle"><input class="fileForm" type="file" name="foto" id="foto"></td>
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
            <a class="back" href="../controlador/CtrlShowMenuSolicitante.php">Volver al Menú</a>
        </body>
        </html>
        <?php
    }
?>


