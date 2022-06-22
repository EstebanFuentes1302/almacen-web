<?php
    function frmRegistrarPedidoShow(){
        
        ?>
        <!doctype html>
        <html>
        <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/style.css">
        <title>Registrar Pedido</title>
        </head>
        <body>
            <div class="topPanel">
                <a class="back" href="../controlador/CtrlShowMenuPedido.php">&lt; Volver al Menú</a>
                <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
            </div>
            
            <h1>Registrar Pedido</h1>
            <div class="div-Form">
            <form method="post" action="../controlador/CtrlRegistrarPedido.php"><table width="474" border="0" align="center">
                  <tr>
                    <td width="174" height="47" align="center" valign="middle" class="txtForm">Código de articulo</td>
                    <td align="center" valign="middle"><input class="txtFieldForm" type="text" name="txtCodigoArticulo" id="txtCodigoArticulo"></td>
                  </tr>
                  <tbody>
                    <tr>
                      <td class="txtForm"  height="41" align="center" valign="middle">Código de solicitante</td>
                      <td width="278" align="center" valign="middle"><input class="txtFieldForm" type="text" name="txtCodigoSolicitante" id="txtCodigoSolicitante"></td>
                    </tr>
                    <tr>
                      <td height="32" align="center" valign="middle" class="txtForm">Cantidad</td>
                      <td align="center" valign="middle"><input class="txtFieldForm" type="text" name="txtCantidad" id="txtCantidad"></td>
                    </tr>
                    <tr>
                      <td height="47" align="center" valign="middle" class="txtForm">Estado</td>
                      <td align="center" valign="middle">
                          <select class="selectForm" name="sEstado" id="sEstado">
                            <option value="Entregado">Entregado</option>
                            <option value="Por Entregar">Por Entregar</option>
                          </select>
                        </td>
                    </tr>
                    <tr>
                      <td height="47" align="center" valign="middle" class="txtForm">Fecha de registro</td>
                      <td align="center" valign="middle"><input class="txtFieldForm"  type="date" name="date" id="date"></td>
                    </tr>
                    <tr>
                      <td height="47" colspan="2" align="center" valign="middle">
                           <input class="button-submit" type="submit" name="btnRegistrarPedido" id="btnRegistrarPedido" value="Registrar Pedido"><br>
                            <input class="reset" type="reset" name="btnLimpiar" id="btnLimpiar" value="Limpiar">
                        </td>
                      </tr>
                    </tbody>
                </table>
            </form>    
            
            </div>
        </body>
        </html>
        <?php
    }
?>


