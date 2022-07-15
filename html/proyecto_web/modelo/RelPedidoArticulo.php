<?php

    class RelPedidoArticulo
    {
        public function registrarRelPedidoArticulo($codigo_pedido, $codigo_articulo, $cantidad){
            include_once('SingletonConexionDB.php');
            conexionSingleton::getInstance();
            $con = conexionSingleton::getConexion();
            
            $sql = "select cantidad from Articulo where codigo='$codigo_articulo'";
            $query = mysqli_query($con, $sql);
            if(mysqli_num_rows($query) > 0){
                $result = mysqli_fetch_array($query);
                $newcantidad = $result['cantidad'] - $cantidad;
                
                $sql2 = "update Articulo set cantidad=$newcantidad where codigo='$codigo_articulo'";
                $query2 = mysqli_query($con, $sql2);
                if($query2){
                    $sql3 = "insert into Rel_Pedido_Articulo values ($codigo_pedido, $codigo_articulo, $cantidad)";
                    $query3 = mysqli_query($con, $sql3);
                    if($query3){
                        return(true);
                    }else{
                        return(false);
                    }
                }else{
                    return(false);
                }
            }else{
                return(false);
            }
        }
        
        public function getArticulosPedido($codigo_pedido){
            include_once('SingletonConexionDB.php');
            conexionSingleton::getInstance();
            $con = conexionSingleton::getConexion();
            $sql = "select * from Rel_Pedido_Articulo where codigo_pedido='$codigo_pedido'";
            $result = mysqli_query($con, $sql);
            if(mysqli_num_rows($result) > 0){
                return($result);
            }else{
                return(null);
            }
        }
    }
    
?>