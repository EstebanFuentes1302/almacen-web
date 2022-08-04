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
            <div class="topPanel">
                    <a class="back" href="../controlador/CtrlShowMenuPedido.php">&lt; Ir Al Menú</a>
                    <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
                </div>
        <h1 align="center">Pedidos Registrados</h1>
            <div class="div-ver">
                <table class="tblShow">
                    <tr>
                        <td class="txtHeader" width="70px" align="center" valign="middle">Código de Pedido</td>
                        <td class="txtHeader" width="90px" align="center" valign="middle">Código de Solicitante</td>
                        <td class="txtHeader" width="150px" align="center" valign="middle">Nombre de Solicitante</td>
                        <td class="txtHeader" width="80px" align="center" valign="middle">Estado</td>
                        <td class="txtHeader" width="100px" align="center" valign="middle">Fecha de Registro</td>
                    </tr>
                    <?php
                        include_once('../modelo/Articulo.php');
                        include_once('../modelo/Solicitante.php');
                        while($pedido = mysqli_fetch_array($pedidos)){
                            $a = new Articulo;
                            $articulo = $a -> buscarArticulo($pedido['codigo_articulo']);
                            $s = new Solicitante;
                            $solicitante = $s -> buscarSolicitante($pedido['codigo_solicitante']);
                            
                    ?>
                        <tr>
                            <td class="txtRow" height="35" align="center" valign="middle"><?php echo $pedido['codigo_pedido']?></td>
                            <td class="txtRow" align="center" valign="middle"><?php echo $pedido['codigo_solicitante']?></td>
                            <td class="txtRow" align="center" valign="middle"><?php echo $solicitante['nombre']?></td>
                            <td class="txtRow" align="center" valign="middle"><?php echo $pedido['estado']?></td>
                            <td class="txtRow" align="center" valign="middle"><?php echo $pedido['fecha_pedido']?></td>
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
    
    public function frmVerPedidosPopUpShow($pedidos){
    ?>
        <!doctype html>
        <html>
        <head>
        <meta charset="utf-8">
            <link rel="stylesheet" href="../css/style.css">
        <title>Ver Pedidos</title>
        </head>
        <body>
        <h1 align="center">Pedidos Registrados</h1>
            <div class="div-ver">
                <table class="tblShow">
                    <tr>
                        <td class="txtHeader" width="70px" align="center" valign="middle">Código de Pedido</td>
                        <td class="txtHeader" width="90px" align="center" valign="middle">Código de Solicitante</td>
                        <td class="txtHeader" width="150px" align="center" valign="middle">Nombre de Solicitante</td>
                        <td class="txtHeader" width="80px" align="center" valign="middle">Estado</td>
                        <td class="txtHeader" width="100px" align="center" valign="middle">Fecha de Registro</td>
                    </tr>
                    <?php
                        include_once('../modelo/Articulo.php');
                        include_once('../modelo/Solicitante.php');
                        while($pedido = mysqli_fetch_array($pedidos)){
                            $a = new Articulo;
                            $articulo = $a -> buscarArticulo($pedido['codigo_articulo']);
                            $s = new Solicitante;
                            $solicitante = $s -> buscarSolicitante($pedido['codigo_solicitante']);
                            
                    ?>
                        <tr>
                            <td class="txtRow" height="35" align="center" valign="middle"><?php echo $pedido['codigo_pedido']?></td>
                            <td class="txtRow" align="center" valign="middle"><?php echo $pedido['codigo_solicitante']?></td>
                            <td class="txtRow" align="center" valign="middle"><?php echo $solicitante['nombre']?></td>
                            <td class="txtRow" align="center" valign="middle"><?php echo $pedido['estado']?></td>
                            <td class="txtRow" align="center" valign="middle"><?php echo $pedido['fecha_pedido']?></td>
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

