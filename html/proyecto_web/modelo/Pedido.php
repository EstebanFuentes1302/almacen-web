
<?php
    include 'ConexionDB.php';
    include 'SingletonConexionDB.php';
    
    class Pedido
    {
        public function registrarPedido($cod_articulo,$cod_solicitante,$estado,$fecha,$cantidad){
            $i = conexionSingleton::getInstance();
            $con = $i -> getConexion();
            $sql="select cantidad from Articulo where codigo='$cod_articulo'";
            $query=mysqli_query($con,$sql);
            $result=mysqli_fetch_array($query);
            if($result){
                if(($result['cantidad'])>=$cantidad){
                    $newcantidad=$result['cantidad']-$cantidad;
                    $sql2="update Articulo set cantidad=$newcantidad where codigo='$cod_articulo'";
                    $query2=mysqli_query($con,$sql2);
                    if($query2){
                        $sql3="insert into Pedido(codigo_articulo,codigo_solicitante,estado,fecha_pedido,cantidad) values('$cod_articulo','$cod_solicitante','$estado','$fecha',$cantidad)";
                        $query3=mysqli_query($con,$sql3);
                        if($query3){
                            return(true);
                        }else{
                            return(false);
                        }
                    }else{
                        return(false);
                    }
                }else{
                    return false;
                }
            }else{
                return(false);
            }
            mysqli_close($con);
        }

        public function buscarPedido($codigo){
            $i = conexionSingleton::getInstance();
            $con = $i -> getConexion();
            $sql = "select * from Pedido where codigo_pedido='$codigo'";
            $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result) > 0){
                return(mysqli_fetch_array($result));
            }else{
                return(null);
            }
        }

        public function modificarPedido($codigo,$codigo_articulo,$cantidad,$oldcantidad){
            $i = conexionSingleton::getInstance();
            $con = $i -> getConexion();
            $diff = $cantidad-$oldcantidad;
            $sql = "select cantidad from Articulo where codigo='$codigo_articulo'";
            //echo $sql."<br>";
            $result=mysqli_query($con,$sql);
            $c=mysqli_fetch_array($result);
            if($c){
                $sum=$c['cantidad']-$diff;
                if($sum>=0){
                    $sql2 = "update Pedido set cantidad=$cantidad where codigo_pedido='$codigo'";
                    //echo $sql2;
                    $query = mysqli_query($con,$sql2);
                    if($query){
                        $sql3 = "update Articulo set cantidad=$sum where codigo='$codigo_articulo'";
                        $query2 = mysqli_query($con,$sql3);
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
            mysqli_close($con);
        }

        public function isDevuelto($codigo){
            $i = conexionSingleton::getInstance();
            $con = $i -> getConexion();
            $sql = "select * from Pedido where codigo_pedido = '$codigo' and estado != 'Devuelto'";
            $result = mysqli_query($con, $sql);
            if(mysqli_num_rows($result) == 0){
                return(true);
            }else{
                return(false);
            }
        }

        public function devolverPedido($codigo_pedido,$codigo_articulo,$cantidad){
            $i = conexionSingleton::getInstance();
            $con = $i -> getConexion();
            $sql = "select cantidad from Articulo where codigo='$codigo_articulo'";
            //echo $sql."<br>";
            $result=mysqli_query($con,$sql);
            $c=mysqli_fetch_array($result);
            if($c){
                $sum=$c['cantidad']+$cantidad;
                $sql2 = "update Articulo set cantidad=$sum where codigo='$codigo_articulo'";
                $query = mysqli_query($con,$sql2);
                if($query){
                    $sql3 = "update Pedido set estado='Devuelto' where codigo_pedido='$codigo_pedido'";
                    //echo $sql2;
                    $query2 = mysqli_query($con,$sql3);
                    if($query2){
                        return(true);
                    }else{
                        return(false);
                    }
                }
            }else{
                return(false);
            }
            mysqli_close($con);
        }

        public function eliminarPedido($codigo,$codigo_articulo,$cantidad){
            $i = conexionSingleton::getInstance();
            $con = $i -> getConexion();
            $sql="delete from Pedido where codigo_pedido='$codigo'";
            $query=mysqli_query($con,$sql);
            if($query){
                $sql2="select cantidad from Articulo where codigo='$codigo_articulo'";
                $query2=mysqli_query($con,$sql2);
                $result=mysqli_fetch_array($query2);
                if($result){
                    $newcantidad=$result['cantidad']+$cantidad;
                    $sql3="update Articulo set cantidad=$newcantidad where codigo='$codigo_articulo'";
                    $query3=mysqli_query($con,$sql3);
                    return(true);
                }else{
                    return(false);
                }
            }else{
                return(false);
            }
            mysqli_close($con);
        }

        public function getPedidos(){
            $i = conexionSingleton::getInstance();
            $con = $i -> getConexion();
            $sql="select * from Pedido";
            $result=mysqli_query($con,$sql);
            return($result);
        }    
    }

    function registrarPedido($cod_articulo,$cod_solicitante,$estado,$fecha,$cantidad){
        try{
            $i = conexionSingleton::getInstance();
            $con = $i -> getConexion();
            $sql="select cantidad from Articulo where codigo='$cod_articulo'";
            $query=mysqli_query($con,$sql);
            $result=mysqli_fetch_array($query);
            if($result){
                if(($result['cantidad'])>=$cantidad){
                    $newcantidad=$result['cantidad']-$cantidad;
                    $sql2="update Articulo set cantidad=$newcantidad where codigo='$cod_articulo'";
                    $query2=mysqli_query($con,$sql2);
                    if($query2){
                        $sql3="insert into Pedido(codigo_articulo,codigo_solicitante,estado,fecha_pedido,cantidad) values('$cod_articulo','$cod_solicitante','$estado','$fecha',$cantidad)";
                        $query3=mysqli_query($con,$sql3);
                        if($query3){
                            return(true);
                        }else{
                            return(false);
                        }
                    }else{
                        return(false);
                    }
                }else{
                    return false;
                }
            }else{
                return(false);
            }
            mysqli_close($con);
        }catch(MySQLException $e){
            echo "error: $e";
        }
    }

    function buscarPedido($codigo){
        $con=conectar();
        $sql="select * from Pedido where codigo_pedido='$codigo'";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0){
            return(mysqli_fetch_array($result));
        }else{
            return(null);
        }
    }
    
    function modificarPedido($codigo,$codigo_articulo,$cantidad,$oldcantidad){
        $con = conectar();
        $diff = $cantidad-$oldcantidad;
        $sql = "select cantidad from Articulo where codigo='$codigo_articulo'";
        //echo $sql."<br>";
        $result=mysqli_query($con,$sql);
        $c=mysqli_fetch_array($result);
        if($c){
            $sum=$c['cantidad']-$diff;
            if($sum>=0){
                $sql2 = "update Pedido set cantidad=$cantidad where codigo_pedido='$codigo'";
                //echo $sql2;
                $query = mysqli_query($con,$sql2);
                if($query){
                    $sql3 = "update Articulo set cantidad=$sum where codigo='$codigo_articulo'";
                    $query2 = mysqli_query($con,$sql3);
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
        mysqli_close($con);
    }
    
    function isDevuelto($codigo){
        $con = conectar();
        $sql = "select * from Pedido where codigo_pedido = '$codigo' and estado != 'Devuelto'";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) == 0){
            return(true);
        }else{
            return(false);
        }
    }
    
    function devolverPedido($codigo_pedido,$codigo_articulo,$cantidad){
        $con = conectar();
        $sql = "select cantidad from Articulo where codigo='$codigo_articulo'";
        //echo $sql."<br>";
        $result=mysqli_query($con,$sql);
        $c=mysqli_fetch_array($result);
        if($c){
            $sum=$c['cantidad']+$cantidad;
            $sql2 = "update Articulo set cantidad=$sum where codigo='$codigo_articulo'";
            $query = mysqli_query($con,$sql2);
            if($query){
                $sql3 = "update Pedido set estado='Devuelto' where codigo_pedido='$codigo_pedido'";
                //echo $sql2;
                $query2 = mysqli_query($con,$sql3);
                if($query2){
                    return(true);
                }else{
                    return(false);
                }
            }
        }else{
            return(false);
        }
        mysqli_close($con);
    }
    
    function eliminarPedido($codigo,$codigo_articulo,$cantidad){
        $con = conectar();
        $sql="delete from Pedido where codigo_pedido='$codigo'";
        $query=mysqli_query($con,$sql);
        if($query){
            $sql2="select cantidad from Articulo where codigo='$codigo_articulo'";
            $query2=mysqli_query($con,$sql2);
            $result=mysqli_fetch_array($query2);
            if($result){
                $newcantidad=$result['cantidad']+$cantidad;
                $sql3="update Articulo set cantidad=$newcantidad where codigo='$codigo_articulo'";
                $query3=mysqli_query($con,$sql3);
                return(true);
            }else{
                return(false);
            }
        }else{
            return(false);
        }
        mysqli_close($con);
    }

    function getPedidos(){
        $con=conectar();
        $sql="select * from Pedido";
        $result=mysqli_query($con,$sql);
        return($result);
    }
?>