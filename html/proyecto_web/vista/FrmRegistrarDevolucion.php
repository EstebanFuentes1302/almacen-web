<?php
    

    function frmRegistrarDevolucionShowDatos($pedido){
        ?>
        <!doctype html>
        <html>
        <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/style.css">
        <title>Registrar Devolución</title>
        </head>

        <body>
            <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
        <h1 align="center">Registrar Devolución</h1>
            <form method="post" action="../controlador/CtrlBuscarPedido.php?r=3">
              <table width="685" border="0" align="center">
                <tbody>
                  <tr>
                    <td class="txtForm" width="122" height="35">Buscar Pedido</td>
                    <td width="553" align="center" valign="middle"><input class="txtFieldForm"  name="txtCodigo" type="text" id="txtCodigo" placeholder="Código de Pedido">
                      <input class="button-submit" type="submit" name="btnBuscar" id="btnBuscar" value="Buscar"></td>
                  </tr>
                </tbody>
              </table>
            </form>
            <div class="div-Form">
                <form method="post" action="../controlador/CtrlRegistrarDevolucion.php?r=<?php echo $pedido['codigo_pedido']?>&s=<?php echo $pedido['cantidad']?>&t=<?php echo $pedido['codigo_articulo']?>"><table width="471" border="0" align="center">
                  <tbody>
                    <tr>
                      <td class="txtForm" width="160" height="35">Código de Pedido</td>
                      <td width="301" align="center" valign="middle"><input class="txtFieldForm" readonly type="text" name="txtCodigo" id="txtCodigo" value="<?php echo $pedido['codigo_pedido']?>"></td>
                    </tr>
                    <tr>
                      <td class="txtForm" height="35">Código de Artículo</td>
                      <td align="center" valign="middle"><input class="txtFieldForm" readonly type="text" name="txtCodigoArticulo" id="txtCodigo2" value="<?php echo $pedido['codigo_articulo']?>"></td>
                    </tr>
                    <tr>
                      <td class="txtForm" height="35">Código de Solicitante</td>
                      <td align="center" valign="middle"><input class="txtFieldForm" readonly type="text" name="txtCodigoSolicitante" id="txtCodigoSolicitante" value="<?php echo $pedido['codigo_solicitante']?>"></td>
                    </tr>

                    <tr>
                      <td class="txtForm" height="35">Cantidad</td>
                      <td align="center" valign="middle"><input class="txtFieldForm" readonly type="text" name="txtCantidad" id="txtCantidad" value="<?php echo $pedido['cantidad']?>"></td>
                      </tr>
                    <tr>
                      <td class="txtForm" height="35">Fecha de Registro</td>
                      <td align="center" valign="middle"><input class="dateForm" readonly type="text" name="txtFecha" id="txtFecha" value="<?php echo $pedido['fecha_pedido']?>"></td>
                    </tr>
                    <tr>
                      <td class="txtForm" height="35">Fecha de Devolución</td>
                      <td align="center" valign="middle"><input class="dateForm" type="date" name="fecha_devolucion" id="fecha_devolucion"></td>
                    </tr>
                    <tr>
                      <td class="txtForm" height="35">Detalles</td>
                      <td align="center" valign="middle"><textarea class="txtAreaForm" name="txtaDetalles" id="txtaDetalles"></textarea></td>
                    </tr>
                    <tr>
                      <td height="39" colspan="2" align="center" valign="middle"><input class="button-submit" type="submit" name="btnDevolver" id="btnDevolver" value="Devolver Pedido">
                        </td>
                      </tr>
                  </tbody>
                  </table>
                </form>        
            </div>
        
        <a class="back" href="../controlador/CtrlShowMenuDevolucion.php">&lt; Volver Al Menú</a>
        </body>
        </html>
    <?php
    }

    function frmRegistrarDevolucionShow(){
        ?>
        <!doctype html>
        <html>
        <head>
        <meta charset="utf-8">
            <link rel="stylesheet" href="../css/style.css">
        <title>Registrar Devolución</title>
        </head>

        <body>
            <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
        <h1 align="center">Registrar Devolución</h1>
            <form method="post" action="../controlador/CtrlBuscarPedido.php?r=3">
              <table width="685" border="0" align="center">
                <tbody>
                  <tr>
                    <td class="txtForm" width="122" height="35">Buscar Pedido</td>
                    <td width="553" align="center" valign="middle"><input class="txtFieldForm"  name="txtCodigo" type="text" id="txtCodigo" placeholder="Código de Pedido">
                      <input class="button-submit" type="submit" name="btnBuscar" id="btnBuscar" value="Buscar"></td>
                  </tr>
                </tbody>
              </table>
            </form>
            <a class="back" href="../controlador/CtrlShowMenuDevolucion.php">Volver Al Menú</a>
        </body>
        </html>
    <?php
    }
?>


