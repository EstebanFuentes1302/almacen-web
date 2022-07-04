<?php
    function frmRegistrarArticuloShow(){
        
        ?>
        <!doctype html>
        <html>
        <head>
        <meta charset="utf-8">
            <link rel="stylesheet" href="../css/style.css";>
        <title>Registrar Artículo</title>
        </head>
        <body>
            <div class="topPanel">
                <a class="back" href="../controlador/CtrlShowMenuArticulo.php">&lt; Volver al Menú</a>
                <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
            </div>
            <h1 align="center">Registrar Artículo</h1>
            <div class="div-menu">
                <form class="form-registrar-articulo" id="formRegistrarArticulo" method="post">
                    <table width="474" border="0" align="center">
                      <tbody>
                        <tr>
                          <td width="174" height="41" align="center" valign="middle"><span class="txtForm">Nombre de artículo</span></td>
                          <td width="278" align="center" valign="middle"><input class="txtFieldForm" type="text" name="txtNombreArticulo" id="txtNombreArticulo">
                            </td>
                        </tr>
                        <tr>
                          <td height="0" colspan="2" align="center" valign="middle"><p class="txtError" id="txtErrorNombre">El nombre del artículo debe contener al menos 2 dígitos</p></td>
                        </tr>
                        <tr>
                          <td height="32" align="center" valign="middle"><span class="txtForm">Cantidad</span></td>
                          <td align="center" valign="middle"><input class="txtFieldForm" type="text" name="txtCantidad" id="txtCantidad"></td>
                        </tr>
                        <tr>
                          <td height="0" colspan="2" align="center" valign="middle"><p class="txtError" id="txtErrorCantidad">La cantidad debe ser un número entero</p></td>
                        </tr>
                        <tr>
                          <td height="47" align="center" valign="middle"><span class="txtForm">Fecha de registro</span>o</td>
                          <td align="center" valign="middle"><input class="dateForm" type="date" name="date" id="date"></td>
                        </tr>
                         <tr>
                          <td height="0" colspan="2" align="center" valign="middle"><p class="txtError" id="txtErrorFecha">La fecha está incompleta</p></td>
                        </tr> 
                          
                        <tr align="center" valign="middle">
                          <td height="21" colspan="2"><hr align="center"></td>
                        </tr>
                        <tr>
                          <td height="47" colspan="2" align="center" valign="middle">
                               <input class="button-submit" type="submit" name="btnRegistrarArticulo" id="btnRegistrarArticulo" value="Registrar Articulo"><br>
                                <input class="reset" type="reset" name="btnLimpiar" id="btnLimpiar" value="Limpiar">
                            </td>
                          </tr>
                        </tbody>
                    </table>
                </form>
                </div>
                
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="../js/validarDatosFormRegistrarArticulo.js"></script>
        </body>
        </html>
        
        <?php
    }
?>


