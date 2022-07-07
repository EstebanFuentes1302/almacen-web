<?php
    class FrmVerDevoluciones
    {
        public function frmVerDevolucionesShow($devoluciones){
        ?>
            <!doctype html>
            <html>
            <head>
            <meta charset="utf-8">
                <link rel="stylesheet" href="../css/style.css">
            <title>Ver Devoluciones</title>
            </head>
            <body>
                <div class="topPanel">
                    <a class="back" href="../controlador/CtrlShowMenuDevolucion.php">&lt; Volver Al Menú</a>
                    <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
                </div>
            <h1 align="center">Devoluciones</h1>
            <div class="div-Form">
                <table class="tblShow">
                    <tr>
                            <td class="txtHeader" width="86" height="27" align="center" valign="middle">Código de devolución</td>
                            <td class="txtHeader" width="170" align="center" valign="middle">Código de Pedido</td>
                            <td class="txtHeader" width="169" align="center" valign="middle">Fecha de Devolución</td>
                            <td class="txtHeader" width="197" align="center" valign="middle">Detalles</td>
                        </tr>
                        <?php
                            while($array=mysqli_fetch_array($devoluciones)){
                        ?>
                            <tr>
                                <td class="txtRow" height="47" align="center" valign="middle"><?php echo $array['codigo_devolucion']?></td>
                                <td class="txtRow" align="center" valign="middle"><?php echo $array['codigo_pedido']?></td>
                                <td class="txtRow" align="center" valign="middle"><?php echo $array['fecha_devolucion']?></td>
                                <td class="txtRow" align="center" valign="middle"><?php echo $array['detalles']?></td>
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

