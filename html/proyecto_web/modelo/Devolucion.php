<?php
    
    class Devolucion{
        
        public function registrarDevolucion($codigo_pedido,$fecha_devolucion,$detalles){
            include_once('SingletonConexionDB.php');
            conexionSingleton::getInstance();
            $con = conexionSingleton::getConexion();
            $sql="insert into Devolucion(codigo_pedido,fecha_devolucion,detalles) values ('$codigo_pedido','$fecha_devolucion','$detalles')";
            $query=mysqli_query($con,$sql);

            if($query){
                return(true);
            }else{
                return(false);
            }
        }

        public function getDevoluciones(){
            include_once('SingletonConexionDB.php');
            conexionSingleton::getInstance();
            $con = conexionSingleton::getConexion();
            $sql = "select * from Devolucion";
            $result = mysqli_query($con, $sql);

            return($result);
        }
    }
    

?>