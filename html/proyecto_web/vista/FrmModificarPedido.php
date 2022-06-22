<?php
    

    function frmModificarPedidoShowDatos($pedido){
        ?>
        <!doctype html>
        <html>
        <head>
        <meta charset="utf-8">
            <link rel="stylesheet" href="../css/style.css">
        <title>Modificar Pedido</title>
        </head>

        <body>
            <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
        <h1 align="center">Modificar Pedido</h1>
            <form method="post" action="../controlador/CtrlBuscarPedido.php?r=1">
              <table width="648" border="0" align="center">
                <tbody>
                  <tr>
                    <td class="txtForm" width="135" height="35">Buscar Código</td>
                    <td width="503" align="center" valign="middle"><input class=txtFieldForm name="txtCodigo" type="text" id="txtCodigo">
                      <input class="button-submit" type="submit" name="btnBuscar" id="btnBuscar" value="Buscar"></td>
                  </tr>
                </tbody>
              </table>
            </form>
        <div class="div-Form">
          <form method="post" action="../controlador/CtrlModificarPedido.php?r=<?php echo $pedido['codigo_pedido']?>&s=<?php echo $pedido['cantidad']?>&t=<?php echo $pedido['codigo_articulo']?>"><table width="428" border="0" align="center">
                  <tbody>
                    <tr>
                      <td class="txtForm"  width="190" height="35">Código de Pedido</td>
                      <td width="228" align="center" valign="middle"><input class="txtFieldForm" readonly type="text" name="txtCodigo" id="txtCodigo" value="<?php echo $pedido['codigo_pedido']?>"></td>
                    </tr>
                    <tr>
                      <td class="txtForm"  height="35">Código de Artículo</td>
                      <td align="center" valign="middle"><input class="txtFieldForm" readonly type="text" name="txtCodigoArticulo" id="txtCodigo2" value="<?php echo $pedido['codigo_articulo']?>"></td>
                    </tr>
                    <tr>
                      <td class="txtForm"  height="35">Código de Solicitante</td>
                      <td align="center" valign="middle"><input class="txtFieldForm" readonly type="text" name="txtCodigoSolicitante" id="txtCodigoSolicitante" value="<?php echo $pedido['codigo_solicitante']?>"></td>
                    </tr>

                    <tr>
                      <td class="txtForm"  height="35">Cantidad</td>
                      <td align="center" valign="middle"><input class="txtFieldForm" type="text" name="txtCantidad" id="txtCantidad" value="<?php echo $pedido['cantidad']?>"></td>
                      </tr>
                    <tr>
                      <td class="txtForm"  height="35">Fecha de Registro</td>
                      <td align="center" valign="middle"><input class="dateForm" type="text" name="txtFecha" id="txtFecha" value="<?php echo $pedido['fecha_pedido']?>"></td>
                    </tr>
                    <tr>
                      <td height="39" colspan="2" align="center" valign="middle"><input class="button-submit" type="submit" name="btnModificar" id="btnModificar" value="Modificar"><br></td>
                      </tr>
                  </tbody>
                  </table>
                </form>        
            </div>
        
        <a class="back" href="../controlador/CtrlShowMenuPedido.php">&lt; Volver Al Menú</a>
        </body>
        </html>
    <?php
    }

    function frmModificarPedidoShow(){
        ?>
        <!doctype html>
        <html>
        <head>
        <meta charset="utf-8">
            <link rel="stylesheet" href="../css/style.css">
        <title>Modificar Pedido</title>
        </head>

        <body>
            <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
        <h1 align="center">Modificar Pedido</h1>
            <form method="post" action="../controlador/CtrlBuscarPedido.php?r=1">
              <table width="648" border="0" align="center">
                <tbody>
                  <tr>
                    <td class="txtForm" width="135" height="35">Buscar Código</td>
                    <td width="503" align="center" valign="middle"><input class=txtFieldForm name="txtCodigo" type="text" id="txtCodigo">
                      <input class="button-submit" type="submit" name="btnBuscar" id="btnBuscar" value="Buscar"></td>
                  </tr>
                </tbody>
              </table>
            </form>
            <a class="back" href="../controlador/CtrlShowMenuPedido.php">&lt; Volver Al Menú</a>
        </body>
        </html>
    <?php
    }
?>

