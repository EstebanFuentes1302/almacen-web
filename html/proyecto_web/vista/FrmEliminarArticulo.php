<?php
    

    /*function frmEliminarArticuloShowDatos($articulo){
        ?>
        <!doctype html>
        <html>
        <head>
        <meta charset="utf-8">
            <link rel="stylesheet" href="../css/style.css">
        <title>Eliminar Artículo</title>
        </head>

        <body>
        <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
        <h1 align="center">Eliminar Artículo</h1>
            <form id="formBuscarArticulo" method="post" action="../controlador/CtrlBuscarArticulo.php?r=2">
              <table width="645" border="0" align="center">
                <tbody>
                  <tr>
                    <td class="txtForm" width="122" height="35" >Buscar Código</td>
                    <td width="513" align="center" valign="middle"><input class="txtFieldForm" name="txtCodigo" type="text" id="txtCodigo">
                      <input class="button-submit" type="submit" name="btnBuscar" id="btnBuscar" value="Buscar"></td>
                  </tr>
                </tbody>
              </table>
            </form>
        <div class="div-Form">
            <form method="post" action="../controlador/CtrlEliminarArticulo.php?r=<?php echo $articulo['codigo']?>"><table width="511" border="0" align="center">
              <tbody>
                <tr>
                  <td class="txtForm" width="180" height="35">Código</td>
                  <td width="321" align="center" valign="middle"><input class="txtFieldForm" readonly type="text" name="txtCodigo" id="txtCodigo" value="<?php echo $articulo['codigo']?>"></td>
                </tr>

                <tr>
                  <td class="txtForm" width="180" height="35">Nombre</td>
                  <td width="321" align="center" valign="middle"><input class="txtFieldForm"  readonly type="text" name="txtNombre" id="txtNombre" value='<?php echo $articulo['nombre']?>'></td>
                  </tr>
                <tr>
                  <td class="txtForm" height="35">Cantidad</td>
                  <td align="center" valign="middle"><input class="txtFieldForm" readonly type="text" name="txtCantidad" id="txtCantidad" value="<?php echo $articulo['cantidad']?>"></td>
                  </tr>
                <tr>
                  <td class="txtForm" height="35">Fecha de Registro</td>
                  <td align="center" valign="middle"><input class="txtFieldForm" readonly type="text" name="txtFecha" id="txtFecha" value="<?php echo $articulo['fecha_registro']?>"></td>
                </tr>
                <tr>
                  <td readonly height="48" colspan="2" align="center" valign="middle"><input class="button-submit" type="submit" name="btnEliminar" id="btnEliminar" value="Eliminar"></td>
                  </tr>
              </tbody>
            </table>
            </form>
        </div>
        
            <a class="back" href='CtrlShowMenuArticulo.php'>&lt; Volver Al Menú</a>
        </body>
        </html>
    <?php
    }*/

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
            <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
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
            <div class="div-Form">
            <form id="formEliminarArticulo" method="post">
            <table id="tblEliminarArticuloDatos" width="511" border="0" align="center">
                    <tbody id="tbodyArticulo">
                      </tbody>
            </table>
            </form>
        </div>
            <a class="back" href='CtrlShowMenuArticulo.php'>&lt; Volver Al Menú</a>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="../js/validarDatosFormEliminarArticulo.js"></script>
        </body>
        </html>
    <?php
    }
?>

