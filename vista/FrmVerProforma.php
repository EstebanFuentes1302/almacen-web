<?php
    class FrmVerProforma{
        public function frmVerProformaShow($codigo){
            include_once('../modelo/Pedido.php');
            $p = new Pedido;
            $pedido = $p -> buscarPedido($codigo);
            //print_r($pedido);
            ?>
                <!doctype html>
                <html>
                <head>
                <meta charset="utf-8">
                <link rel="stylesheet" href="../css/style.css">
                <title>Proforma de Pedido</title>
                </head>
                <body>
                    <div class="topPanel">
                        <a class="back" href="../controlador/CtrlShowVerPedidos.php">&lt; Volver</a>
                        <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
                    </div>
                    <h1>Proforma de Pedido</h1>
                    <div class="div-ver">
                        <table class="tblProforma">
                            <tr class="tr-proforma">
                                <td class="td-proforma txtHeader txtHeaderProforma" colspan="4">Código de pedido</td>
                                <td class="td-proforma" colspan="8"><?php echo $pedido['codigo_pedido'] ?></td>
                            </tr>
                            <tr class="tr-proforma">
                                <td class="td-proforma txtHeader txtHeaderProforma" colspan="3">Fecha de Pedido</td>
                                <td class="td-proforma" colspan="3"><?php echo $pedido['fecha_pedido'] ?></td>
                                <td class="td-proforma txtHeader txtHeaderProforma" colspan="3">Código de Solicitante</td>
                                <td class="td-proforma" colspan="3"><?php echo $pedido['codigo_solicitante'] ?></td>
                            </tr>
                            <tr class="tr-proforma">
                                <td class="td-proforma txtHeader txtHeaderProforma" colspan="6">Estado de Pedido</td>
                                <td class="td-proforma" colspan="6"><?php echo $pedido['estado'] ?></td>
                            </tr>
                            <tr class="tr-proforma">
                                <td class="td-proforma txtHeader txtHeaderProforma" align="middle" colspan="12">Artículos</td>
                            </tr>
                            <tr class="tr-proforma">
                                <td class="td-proforma txtHeader txtHeaderProforma" colspan="8">Nombre</td>
                                <td class="td-proforma txtHeader txtHeaderProforma" colspan="4">Cantidad</td>
                            </tr>
                            
                            <?php
                                include_once('../modelo/RelPedidoArticulo.php');
                                include_once('../modelo/Articulo.php');    
                                $r = new RelPedidoArticulo;
                                $a = new Articulo;
                                $rel = $r -> getArticulosPedido($codigo);
                                while($rpa = mysqli_fetch_assoc($rel)){
                                    $articulo = $a -> buscarArticulo($rpa['codigo_articulo']);
                                    ?>
                                        <tr class="tr-proforma">
                                            <td class="td-proforma" colspan='8'><?php echo $articulo['nombre'] ?></td>
                                            <td class="td-proforma" colspan='4'><?php echo $rpa['cantidad'] ?></td>
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

