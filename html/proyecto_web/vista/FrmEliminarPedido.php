<?php
    

    function frmEliminarPedidoShowDatos($pedido){
        ?>
        <!doctype html>
        <html>
        <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/style.css">
        <title>Eliminar Pedido</title>
        </head>

        <body>
        <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
        <h1 align="center">Eliminar Pedido</h1>
            <form method="post" action="../controlador/CtrlBuscarPedido.php?r=2">
              <table width="612" border="0" align="center">
                <tbody>
                  <tr>
                    <td class="txtForm" width="122" height="35">Buscar Código</td>
                    <td width="480" align="center" valign="middle"><input class="txtFieldForm" name="txtCodigo" type="text" id="txtCodigo">
                      <input class="button-submit" type="submit" name="btnBuscar" id="btnBuscar" value="Buscar"></td>
                  </tr>
                </tbody>
              </table>
            </form>
        <div class="div-Form">
            <form method="post" action="../controlador/CtrlEliminarPedido.php?r=<?php echo $pedido['codigo_pedido']?>&s=<?php echo $pedido['codigo_articulo']?>&t=<?php echo $pedido['cantidad']?>"><table width="435" border="0" align="center">
              <tbody>
                <tr>
                  <td class="txtForm" width="179" height="35">Código de Pedido</td>
                  <td width="246" align="center" valign="middle"><input class="txtFieldForm" readonly type="text" name="txtCodigo" id="txtCodigo" value="<?php echo $pedido['codigo_pedido']?>"></td>
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
                  <td align="center" valign="middle"><input class="txtFieldForm" readonly type="text" name="txtFecha" id="txtFecha" value="<?php echo $pedido['fecha_pedido']?>"></td>
                </tr>
                <tr>
                  <td height="39" colspan="2" align="center" valign="middle"><input class="button-submit" type="submit" name="btnEliminar" id="btnEliminar" value="Eliminar"></td>
                  </tr>
              </tbody>
              </table>
            </form>    
        </div>
        
            <a class="back" href="../controlador/CtrlShowMenuPedido.php">Volver Al Menú</a>
        </body>
        </html>
    <?php
    }

    function frmEliminarPedidoShow(){
        ?>
        <!doctype html>
        <html>
        <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/style.css">
        <title>Eliminar Pedido</title>
        </head>

        <body>
            <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
        <h1 align="center">Eliminar Pedido</h1>
            <form method="post" action="../controlador/CtrlBuscarPedido.php?r=2">
              <table width="612" border="0" align="center">
                <tbody>
                  <tr>
                    <td class="txtForm" width="122" height="35">Buscar Código</td>
                    <td width="480" align="center" valign="middle"><input class="txtFieldForm" name="txtCodigo" type="text" id="txtCodigo">
                      <input class="button-submit" type="submit" name="btnBuscar" id="btnBuscar" value="Buscar"></td>
                  </tr>
                </tbody>
              </table>
            </form>
            <a class="back" href="../controlador/CtrlShowMenuPedido.php">Volver Al Menú</a>
        </body>
        </html>
    <?php
    }
?>

