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
                <form method="post" action="../controlador/CtrlValidarLogin.php">
                  <table width="359" border="0" align="center">
                    <tbody>
                      <tr>
                        <td width="145" height="42" class="txtForm">Usuario</td>
                        <td  width="204" colspan="2"><input class="txtFieldForm" type="text" name="txtUsuario" id="txtUsuario"></td>
                      </tr>
                      <tr>
                        <td height="42" class="txtForm">Contraseña</td>
                        <td colspan="2"><input class="txtFieldForm" type="password" name="txtPassword" id="txtPassword"></td>
                      </tr>
                      <tr>
                        <td height="39" colspan="3" align="center" valign="middle"><input type="submit" class="button-submit" name="btnIngresar" id="btnIngresar" value="Ingresar"></td>
                      </tr>
                    </tbody>
                  </table>
                </form>
                </body>
            </html>
        <?php
        }    
    }
    
?>

