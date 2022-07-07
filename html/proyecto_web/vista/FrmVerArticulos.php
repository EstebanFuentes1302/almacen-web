<?php
class FrmVerArticulos
{
    public function frmVerArticulosShow($articulos){
    ?>
        <!doctype html>
        <html>
        <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/style.css">
        <title>Ver Pedidos</title>
        </head>
        <body>
            <div class="topPanel">
                <a class="back" href="../controlador/CtrlShowMenuArticulo.php?r=value">&lt; Ir Al Menú</a>
                <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
            </div>
            
        <h1 align="center">Artículos Registrados</h1>
        <div class="div-ver">
            <table class="tblShow" width="573">
                <tr>
                    <td class="txtHeader" width="82" height="27" align="center" valign="middle">Código</td>
                    <td class="txtHeader" width="131" align="center" valign="middle">Nombre</td>
                    <td class="txtHeader" width="67" align="center" valign="middle">Cantidad</td>
                    <td class="txtHeader" width="158" align="center" valign="middle">Fecha de Registro</td>
                </tr>
                <?php
                    while($array=mysqli_fetch_array($articulos)){
                ?>
                    <tr>
                        <td class="txtRow" height="35" align="center" valign="middle"><?php echo $array['codigo']?></td>
                        <td class="txtRow" align="center" valign="middle"><?php echo $array['nombre']?></td>
                        <td class="txtRow" align="center" valign="middle"><?php echo $array['cantidad']?></td>
                        <td class="txtRow" align="center" valign="middle"><?php echo $array['fecha_registro']?></td>
              </tr>
                <?php                
                    }
                ?>
            </table>
        </div>
        </body>
        </html>
    <?php
    }
}

?>

