<?php
class FrmVerPedidos
{
    public function frmVerPedidosShow($pedidos){
    ?>
        <!doctype html>
        <html>
        <head>
        <meta charset="utf-8">
            <link rel="stylesheet" href="../css/style.css">
        <title>Ver Pedidos</title>
        </head>
        <body>
            <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
        <h1 align="center">Pedidos Registrados</h1>
            <div class="div-ver">
                <table class="tblShow">
                    <tr>
                        <td class="txtHeader" width="82" height="27" align="center" valign="middle">Código de pedido</td>
                        <td class="txtHeader" width="131" align="center" valign="middle">Código de Artículo</td>
                        <td class="txtHeader" width="79" align="center" valign="middle">Código de Solicitante</td>
                        <td class="txtHeader" width="83" align="center" valign="middle">Cantidad</td>
                        <td class="txtHeader" width="83" align="center" valign="middle">Estado</td>
                        <td class="txtHeader" width="130" align="center" valign="middle">Fecha de Registro</td>
                    </tr>
                    <?php
                        while($array=mysqli_fetch_array($pedidos)){
                    ?>
                        <tr>
                            <td class="txtRow" height="35" align="center" valign="middle"><?php echo $array['codigo_pedido']?></td>
                            <td class="txtRow" align="center" valign="middle"><?php echo $array['codigo_articulo']?></td>
                            <td class="txtRow" align="center" valign="middle"><?php echo $array['codigo_solicitante']?></td>
                            <td class="txtRow" align="center" valign="middle"><?php echo $array['cantidad']?></td>
                            <td class="txtRow" align="center" valign="middle"><?php echo $array['estado']?></td>
                            <td class="txtRow" align="center" valign="middle"><?php echo $array['fecha_pedido']?></td>
                  </tr>
                    <?php                
                        }
                    ?>
                </table>    
            </div>
            <a class="back" href="../controlador/CtrlShowMenuPedido.php">&lt; Ir Al Menú</a>
        </body>
        </html>
    <?php
    }
}

?>

