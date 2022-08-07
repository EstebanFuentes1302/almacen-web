<?php
    //include 'SingletonConexionDB.php';
    
    class Articulo
    {
        public function registrarArticulo($nombre, $cantidad, $fecha){
            include_once('SingletonConexionDB.php');
            conexionSingleton::getInstance();
            $con = conexionSingleton::getConexion();
            //$con = conectar();
            $sql = "insert into Articulo(nombre,cantidad,fecha_registro) values ('$nombre',$cantidad,'$fecha')";
            $query = mysqli_query($con, $sql);
            if($query){
                return(true);
            }else{
                return(false);
            }
        }

        public function isUsedArticulo($codigo){
            include_once('SingletonConexionDB.php');
            $i = conexionSingleton::getInstance();
            $con = $i -> getConexion();
            $sql = "select * from Pedido where codigo_articulo='$codigo'";
            $result = mysqli_query($con, $sql);
            if($result){
                if(mysqli_num_rows($result) > 0){
                    return(true);
                }else{
                    return(false);
                }
            }else{
                return(false);
            }
        }

        public function getArticulos(){
            include_once('SingletonConexionDB.php');
            conexionSingleton::getInstance();
            $con = conexionSingleton::getConexion();
            $sql="select * from Articulo";
            $result=mysqli_query($con,$sql);
            return($result);
        }

        public function buscarArticulo($codigo){
            include_once('SingletonConexionDB.php');
            conexionSingleton::getInstance();
            $con = conexionSingleton::getConexion();
            $sql="select * from Articulo where codigo='$codigo'";
            $result=mysqli_query($con,$sql);

            if(mysqli_num_rows($result)>0){
                return(mysqli_fetch_array($result));
            }else{
                return(null);
            }
        }

        public function modificarArticulo($codigo,$nombre,$cantidad,$fecha){
            include_once('SingletonConexionDB.php');
            conexionSingleton::getInstance();
            $con = conexionSingleton::getConexion();
            //$sql="update Articulo set nombre='$nombre',cantidad=$cantidad,fecha_registro='$fecha' where codigo='$codigo'";
            $sql="update Articulo set nombre='$nombre',cantidad=$cantidad where codigo='$codigo'";
            //echo $sql."<br>";
            $query=mysqli_query($con,$sql);
            if($query){
                return(true);
            }else{
                return(false);
            }
        }

        public function eliminarArticulo($codigo){
            include_once('SingletonConexionDB.php');
            conexionSingleton::getInstance();
            $con = conexionSingleton::getConexion();
            $sql="delete from Articulo where codigo='$codigo'";
            $query=mysqli_query($con,$sql);
            if($query){
                return(true);
            }else{
                return(false);
            }
        }
        
        public function verificarCantidad($codigo, $cantidad){
            include_once('SingletonConexionDB.php');
            conexionSingleton::getInstance();
            $con = conexionSingleton::getConexion();
            $sql = "select cantidad from Articulo where codigo='$codigo'";
            $result = mysqli_query($con, $sql);
            
            if(mysqli_num_rows($result) > 0){
                $arr = mysqli_fetch_assoc($result);
                $oldcantidad = $arr['cantidad'];
                if($cantidad <= $oldcantidad){
                    return(true);
                }else{
                    return(false);
                }
            }else{
                return(false);
            }
        }
        
        public function actualizarStock($cantidad, $codigo){
            include_once('SingletonConexionDB.php');
            conexionSingleton::getInstance();
            $con = conexionSingleton::getConexion();
            $sql = "select cantidad from Articulo where codigo='$codigo'";
            $query = mysqli_query($con, $sql);
            if(mysqli_num_rows($query) > 0){
                $articulo = mysqli_fetch_assoc($query);
                $oldcantidad = $articulo['cantidad'];
                $newcantidad = $cantidad + $oldcantidad;
                $sql2 = "update Articulo set cantidad=$newcantidad where codigo='$codigo'";
                $query2 = mysqli_query($con, $sql2);
                if($query2){
                    return(true);
                }else{
                    return(false);
                }
            }else{
                return(false);
            }
        }
    }
?>
