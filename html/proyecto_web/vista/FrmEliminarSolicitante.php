<?php
    

    function frmEliminarSolicitanteShowDatos($solicitante){
        ?>
        <!doctype html>
        <html>
        <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/style.css">
        <title>Eliminar Solicitante</title>
        </head>

        <body>
    <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
        <h1 align="center">Eliminar Solicitante</h1>
        <form method="post" action="../controlador/CtrlBuscarSolicitante.php?r=2">
              <table width="624" border="0" align="center">
                <tbody>
                  <tr>
                    <td class="txtForm" width="149" height="35" >Buscar Código</td>
                    <td  width="465" align="center" valign="middle"><input class="txtFieldForm" name="txtCodigo" type="text" id="txtCodigo">
                      <input class="button-submit" type="submit" name="btnBuscar" id="btnBuscar" value="Buscar"></td>
                  </tr>
                </tbody>
              </table>
            </form>
        <div class="div-Form">
            <form method="post" action="../controlador/CtrlEliminarSolicitante.php?r=<?php echo $solicitante['codigo_solicitante']?>"><table width="416" border="0" align="center">
              <tbody>
                <tr>
                  <td class="txtForm" width="130" height="35">Código</td>
                  <td width="276" align="center" valign="middle"><input class="txtFieldForm" readonly type="text" name="txtCodigo" id="txtCodigo" value="<?php echo $solicitante['codigo_solicitante']?>"></td>
                </tr>

                <tr>
                  <td class="txtForm" width="130" height="35">Nombre</td>
                  <td width="276" align="center" valign="middle"><input class="txtFieldForm" readonly type="text" name="txtNombre" id="txtNombre" value='<?php echo $solicitante['nombre']?>'></td>
                  </tr>
                <tr>
                  <td class="txtForm" height="35">Correo</td>
                  <td align="center" valign="middle"><input class="txtFieldForm" readonly type="text" name="txtCantidad" id="txtCantidad" value="<?php echo $solicitante['email']?>"></td>
                  </tr>
                <tr>
                  <td class="txtForm" height="35">Teléfono</td>
                  <td align="center" valign="middle"><input class="txtFieldForm" readonly type="text" name="txtFecha" id="txtFecha" value="<?php echo $solicitante['telefono']?>"></td>
                </tr>
                <tr>
                  <td class="txtForm" height="35" colspan="2" align="center" valign="middle">Foto</td>
                </tr>
                <tr>
                  <td height="100" colspan="2" align="center" valign="middle"><img class="fotoShow" src="<?php echo $solicitante['foto'] ?>" height="80" width="60"></td>
                </tr>
                <tr>
                  <td readonly height="48" colspan="2" align="center" valign="middle"><input class="button-submit" type="submit" name="btnEliminar" id="btnEliminar" value="Eliminar"></td>
                  </tr>
              </tbody>
            </table>
            </form>    
        </div>
            
        
            <a class="back" href='../controlador/CtrlShowMenuSolicitante.php'>&lt; Volver Al Menú</a>
        </body>
        </html>
    <?php
    }

    function frmEliminarSolicitanteShow(){
        ?>
        <!doctype html>
        <html>
        <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/style.css">
        <title>Eliminar Solicitante</title>
        </head>

        <body>
            <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
        <h1 align="center">Eliminar Solicitante</h1>
            <form method="post" action="../controlador/CtrlBuscarSolicitante.php?r=2">
              <table width="624" border="0" align="center">
                <tbody>
                  <tr>
                    <td class="txtForm" width="149" height="35" >Buscar Código</td>
                    <td  width="465" align="center" valign="middle"><input class="txtFieldForm" name="txtCodigo" type="text" id="txtCodigo">
                      <input class="button-submit" type="submit" name="btnBuscar" id="btnBuscar" value="Buscar"></td>
                  </tr>
                </tbody>
              </table>
            </form>
            <a class="back" href='../controlador/CtrlShowMenuSolicitante.php'>&lt; Volver Al Menú</a>
        </body>
        </html>
    <?php
    }
?>

