<?php

    function frmEliminarArticuloShow(){
        ?>
        <!doctype html>
        <html>
        <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/style.css">
        <title>Eliminar Articulo</title>
        </head>

        <body>
            <div class="topPanel">
                <a class="back" href="../controlador/CtrlShowMenuArticulo.php">&lt; Volver al Menú</a>
                <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
            </div>
        <h1 align="center">Eliminar Articulo</h1>
            <form id="formBuscarArticulo" method="post">
              <table width="645" border="0" align="center">
                <tbody>
                  <tr>
                    <td class="txtForm" width="122" height="35" >Buscar Código</td>
                    <td width="513" align="center" valign="middle"><input class="txtFieldForm" name="txtCodigoBuscar" type="text" id="txtCodigoBuscar">
                      <input class="button-submit" type="submit" name="btnBuscar" id="btnBuscar" value="Buscar"></td>
                  </tr>
                </tbody>
              </table>
                <p class="txtError" id="txtErrorCodigo">El código de artículo debe contener un número entre 1001 y 9999</p>
            </form>
            <hr class="hr">
            <div class="div-Form">
            <form id="formEliminarArticulo" method="post">
            <table id="tblEliminarArticuloDatos" width="511" border="0" align="center">
                    <tbody id="tbodyArticulo">
                      </tbody>
            </table>
            </form>
        </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="../js/validarDatosFormEliminarArticulo.js"></script>
        </body>
        </html>
    <?php
    }
?>

