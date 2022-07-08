<?php
    //include 'SingletonConexionDB.php';
    
    class Articulo
    {
        public function registrarArticulo($nombre, $cantidad, $fecha){
            include_once('SingletonConexionDB.php');
            $i = conexionSingleton::getInstance();
            $con = $i -> getConexion();
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
            $i = conexionSingleton::getInstance();
            $con = $i -> getConexion();
            $sql="select * from Articulo";
            $result=mysqli_query($con,$sql);
            return($result);
        }

        public function buscarArticulo($codigo){
            include_once('SingletonConexionDB.php');
            $i = conexionSingleton::getInstance();
            $con = $i -> getConexion();
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
            $i = conexionSingleton::getInstance();
            $con = $i -> getConexion();
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
            $i = conexionSingleton::getInstance();
            $con = $i -> getConexion();
            $sql="delete from Articulo where codigo='$codigo'";
            $query=mysqli_query($con,$sql);
            if($query){
                return(true);
            }else{
                return(false);
            }
        }
    }
?>
