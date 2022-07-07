<?php
    class FrmRegistrarPedido
    {
        public function frmRegistrarPedidoShow(){
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
                <form id="formRegistrarPedido" method="post">
                    <table width="474" border="0" align="center">
                      <tbody>
                        <tr>
                            <td width="174" height="47" align="center" valign="middle" class="txtForm">Código de articulo</td>
                            <td align="center" valign="middle"><input class="txtFieldForm" type="text" name="txtCodigoArticulo" id="txtCodigoArticulo"></td>
                        </tr>
                            <tr>
                              <td height="0" colspan="2" align="center" valign="middle"><p class="txtError" id="txtErrorCodigoArticulo">El código del artículo debe contener un número del 1001 al 9999</p></td>
                            </tr>
                        <tr>
                          <td class="txtForm"  height="41" align="center" valign="middle">Código de solicitante</td>
                          <td width="278" align="center" valign="middle"><input class="txtFieldForm" type="text" name="txtCodigoSolicitante" id="txtCodigoSolicitante"></td>
                        </tr>
                        <tr>
                          <td height="0" colspan="2" align="center" valign="middle"><p class="txtError" id="txtErrorCodigoSolicitante">El código de solicitante es un número de 8 dígitos y comienza con (1-9)</p></td>
                        </tr>
                        <tr>
                          <td height="32" align="center" valign="middle" class="txtForm">Cantidad</td>
                          <td align="center" valign="middle"><input class="txtFieldForm" type="text" name="txtCantidad" id="txtCantidad"></td>
                        </tr>
                        <tr>
                          <td height="0" colspan="2" align="center" valign="middle"><p class="txtError" id="txtErrorCantidad">La cantidad debe ser un número entero</p></td>
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
                          <td align="center" valign="middle"><input class="txtFieldForm" type="date" name="date" id="date"></td>
                        </tr>
                        <tr>
                          <td height="0" colspan="2" align="center" valign="middle"><p class="txtError" id="txtErrorFecha">La fecha está incompleta</p></td>
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
                <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="../js/validarDatosFormRegistrarPedido.js"></script>
            </body>
            </html>
            <?php
        }
    }
?>


