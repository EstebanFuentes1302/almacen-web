<?php
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
            <div class="topPanel">
                <a class="back" href="../controlador/CtrlShowMenuDevolucion.php">&lt; Volver Al Menú</a>
                <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
            </div>
        <h1 align="center">Devolver Pedido</h1>
            <form id="formBuscarDevolucion">
              <table width="685" border="0" align="center">
                <tbody>
                  <tr>
                    <td class="txtForm" width="122" height="35">Buscar Pedido</td>
                    <td width="553" align="center" valign="middle"><input class="txtFieldForm"  name="txtCodigoBuscar" type="text" id="txtCodigoBuscar" placeholder="Código de Pedido">
                      <input class="button-submit" type="submit" name="btnBuscar" id="btnBuscar" value="Buscar"></td>
                  </tr>
                </tbody>
              </table>
                <p class="txtError" id="txtErrorCodigo">El código de pedido debe contener un número entre 1001 y 9999</p>
            </form>
            <hr class="hr">
            <div class="div-Form">
                <form id="formRegistrarDevolucion" method="post">
                <table id="tblRegistrarDevolucion" width="471" border="0" align="center">
                  <tbody id="tbodyDevolucion">
                  </tbody>
                    <tr>
                        <td colspan="2"><p class="txtError" id="txtErrorFecha">La fecha está incompleta</p></td>
                    </tr>
                    <tbody id="tbodyDevolucion2">
                    </tbody>
                    <tr>
                        <td colspan="2"><p class="txtError" id="txtaErrorDetalles">Ha excedido el límite de caracteres</p></td>
                    </tr>
                    <tbody id="tbodyDevolucion3">
                    </tbody>
                  </table>
                </form>        
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="../js/validarDatosFormRegistrarDevolucion.js"></script>
        
        </body>
        </html>
    <?php
    }
?>


