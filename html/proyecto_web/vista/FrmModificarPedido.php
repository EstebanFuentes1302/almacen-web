<?php
    class FrmModificarPedido
    {
        public function frmModificarPedidoShow(){
            ?>
            <!doctype html>
            <html>
            <head>
            <meta charset="utf-8">
                <link rel="stylesheet" href="../css/style.css">
            <title>Modificar Pedido</title>
            </head>

            <body>
                <div class="topPanel">
                    <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
                    <a class="back" href="../controlador/CtrlShowMenuPedido.php">&lt; Volver Al Menú</a>
                </div>
                <h1>Modificar Pedido</h1>
                <form id=formBuscarPedido method="post">
                  <table width="648" border="0" align="center">
                    <tbody>
                      <tr>
                        <td class="txtForm" width="135" height="35">Buscar Código</td>
                        <td width="503" align="center" valign="middle">
                        <input class=txtFieldForm name="txtCodigoBuscar" type="text" id="txtCodigoBuscar" placeholder="Código de Pedido">
                        <input class="button-submit" type="submit" name="btnBuscar" id="btnBuscar" value="Buscar"></td>
                      </tr>
                    </tbody>
                  </table>
                    <p class="txtError" id="txtErrorCodigo">El código de artículo debe contener un número entre 1001 y 9999</p>
                </form>

                <div class="div-Form">
                    <hr class="hr">
                        <form id="formModificarPedido" method="post"?>
                        <table id="tblModificarPedido" width="512" border="0" align="center">
                          <tbody id="tbodyPedido">

                          </tbody>
                        <tr>
                            <td colspan="2"><p class="txtError" id="txtErrorCantidad">La cantidad debe ser un número entero</p></td>
                        </tr>
                            <tbody id="tbodyPedido2">

                            </tbody>
                        </table>
                        </form>
                </div>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="../js/validarDatosFormModificarPedido.js"></script>
            </body>
            </html>
        <?php
        }
    }
    
?>

