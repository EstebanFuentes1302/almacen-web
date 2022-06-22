<?php
    

    function frmModificarSolicitanteShowDatos($solicitante){
        ?>
        <!doctype html>
        <html>
        <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/style.css">
        <title>Modificar Solicitante</title>
        </head>

        <body>
            <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
        <h1 align="center">Modificar Solicitante</h1>
            
            <form method="post" action="../controlador/CtrlBuscarSolicitante.php?r=1">
              <table width="706" border="0" align="center">
                <tbody>
                  <tr>
                    <td class="txtForm" width="157" height="35">Buscar Código</td>
                    <td width="539" align="center" valign="middle"><input class="txtFieldForm" name="txtCodigo" type="text" id="txtCodigo">
                      <input class="button-submit" type="submit" name="btnBuscar" id="btnBuscar" value="Buscar"></td>
                  </tr>
                </tbody>
              </table>
            </form>
            <div class="div-Form">
                <form method="post" action="../controlador/CtrlModificarSolicitante.php?r=<?php echo $solicitante['codigo_solicitante']?>"><table width="462" border="0" align="center">
                  <tbody>
                    <tr>
                      <td class="txtForm"  width="182" height="35">Código</td>
                      <td width="270" align="center" valign="middle"><input class="txtFieldForm" readonly type="text" name="txtCodigo" id="txtCodigo" value="<?php echo $solicitante['codigo_solicitante']?>"></td>
                    </tr>

                    <tr>
                      <td class="txtForm"  width="182" height="35">Nombre</td>
                      <td width="270" align="center" valign="middle"><input class="txtFieldForm" type="text" name="txtNombre" id="txtNombre" value='<?php echo $solicitante['nombre']?>'></td>
                      </tr>
                    <tr>
                      <td class="txtForm"  height="35">Correo Electrónico</td>
                      <td align="center" valign="middle"><input class="txtFieldForm"  type="email" name="txtCorreo" id="txtCorreo" value="<?php echo $solicitante['email']?>"></td>
                      </tr>
                    <tr>
                      <td class="txtForm"  height="35">Teléfono</td>
                      <td align="center" valign="middle"><input class="txtFieldForm" type="tel" name="txtTelefono" id="txtTelefono" value="<?php echo $solicitante['telefono']?>"></td>
                    </tr>
                    <tr>
                      <td height="72" colspan="2" align="center" valign="middle"><img class="fotoShow" src="<?php echo $solicitante['foto'] ?>" width="200px" height="200px"></td>
                    </tr>
                    <tr>
                      <td height="39" colspan="2" align="center" valign="middle"><input class="button-submit" type="submit" name="btnModificar" id="btnModificar" value="Modificar">
                        </td>
                      </tr>
                  </tbody>
                  </table>
                </form>    
            </div>
        
            <a class="back" href="../controlador/CtrlShowMenuSolicitante.php">Volver Al Menú</a>
        </body>
        </html>
    <?php
    }

    function frmModificarSolicitanteShow(){
        ?>
        <!doctype html>
        <html>
        <head>
        <meta charset="utf-8">
            <link rel="stylesheet" href="../css/style.css">
        <title>Modificar Solicitante</title>
        </head>

        <body>
            <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
        <h1 align="center">Modificar Solicitante</h1>
            <form method="post" action="../controlador/CtrlBuscarSolicitante.php?r=1">
              <table width="706" border="0" align="center">
                <tbody>
                  <tr>
                    <td class="txtForm" width="157" height="35">Buscar Código</td>
                    <td width="539" align="center" valign="middle"><input class="txtFieldForm" name="txtCodigo" type="text" id="txtCodigo">
                      <input class="button-submit" type="submit" name="btnBuscar" id="btnBuscar" value="Buscar"></td>
                  </tr>
                </tbody>
              </table>
            </form>
            <a class="back" href="../controlador/CtrlShowMenuSolicitante.php">Volver Al Menú</a>
        </body>
        </html>
    <?php
    }
?>

