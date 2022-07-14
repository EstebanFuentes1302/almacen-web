
<?php
    //include 'SingletonConexionDB.php';
    
    class Pedido
    {
        public function registrarPedido($cod_solicitante, $estado, $fecha){
            include_once('SingletonConexionDB.php');
            conexionSingleton::getInstance();
            $con = conexionSingleton::getConexion();
            $code = $this -> getAutoIncrement();
            $sql = "insert into Pedido(codigo_solicitante,estado,fecha_pedido) values('$cod_solicitante','$estado','$fecha')";
            $query = mysqli_query($con, $sql);
            if($query){
                return($code);
            }else{
                return(false);
            }  
        }

        public function buscarPedido($codigo){
            include_once('SingletonConexionDB.php');
            conexionSingleton::getInstance();
            $con = conexionSingleton::getConexion();
            $sql = "select * from Pedido where codigo_pedido='$codigo'";
            $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result) > 0){
                return(mysqli_fetch_array($result));
            }else{
                return(null);
            }
        }

        public function modificarPedido($codigo, $codigo_articulo, $cantidad, $estado, $oldcantidad){
            include_once('SingletonConexionDB.php');
            conexionSingleton::getInstance();
            $con = conexionSingleton::getConexion();
            $diff = $cantidad - $oldcantidad;
            $sql = "select cantidad from Articulo where codigo='$codigo_articulo'";
            
            $result = mysqli_query($con, $sql);
            $c = mysqli_fetch_array($result);
            if($c){
                $sum = $c['cantidad'] - $diff;
                if($sum >= 0){
                    $sql2 = "update Pedido set cantidad=$cantidad, estado='$estado' where codigo_pedido='$codigo'";
                    $query = mysqli_query($con, $sql2);
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
        }

        public function isDevuelto($codigo){
            include_once('SingletonConexionDB.php');
            conexionSingleton::getInstance();
            $con = conexionSingleton::getConexion();
            $sql = "select * from Pedido where codigo_pedido = '$codigo' and estado = 'Devuelto'";
            $result = mysqli_query($con, $sql);
            if(mysqli_num_rows($result) == 0){
                return(false);
            }else{
                return(true);
            }
        }

        public function devolverPedido($codigo_pedido, $codigo_articulo, $cantidad){
            include_once('SingletonConexionDB.php');
            conexionSingleton::getInstance();
            $con = conexionSingleton::getConexion();
            $sql = "select cantidad from Articulo where codigo='$codigo_articulo'";
            $result=mysqli_query($con,$sql);
            $c=mysqli_fetch_array($result);
            if($c){
                $sum=$c['cantidad']+$cantidad;
                $sql2 = "update Articulo set cantidad=$sum where codigo='$codigo_articulo'";
                $query = mysqli_query($con,$sql2);
                if($query){
                    $sql3 = "update Pedido set estado='Devuelto' where codigo_pedido='$codigo_pedido'";
                    $query2 = mysqli_query($con, $sql3);
                    if($query2){
                        return(true);
                    }else{
                        return(false);
                    }
                }
            }else{
                return(false);
            }
        }

        public function eliminarPedido($codigo,$codigo_articulo,$cantidad){
            include_once('SingletonConexionDB.php');
            conexionSingleton::getInstance();
            $con = conexionSingleton::getConexion();
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
        }

        public function getPedidos(){
            include_once('SingletonConexionDB.php');
            conexionSingleton::getInstance();
            $con = conexionSingleton::getConexion();
            $sql = "select * from Pedido";
            $result = mysqli_query($con,$sql);
            return($result);
        }
        
        private function getAutoIncrement(){
            include_once('SingletonConexionDB.php');
            conexionSingleton::getInstance();
            $con = conexionSingleton::getConexion();
            $sql = "SHOW TABLE STATUS FROM bd_almacen";
            $result = mysqli_query($con, $sql);
            while($arr = mysqli_fetch_assoc($result)){
                if($arr['Name'] == "Pedido"){
                    $auto = $arr['Auto_increment'];
                    break;
                }
            }
            return($auto);
        }
    }

?>