<?php
    include 'SingletonConexionDB.php';
    
    class Devolucion{
        
        public function registrarDevolucion($codigo_pedido,$fecha_devolucion,$detalles){
            //include_once('SingletonConexionDB');
            $i = conexionSingleton::getInstance();
            $con = $i -> getConexion();
            $sql="insert into Devolucion(codigo_pedido,fecha_devolucion,detalles) values ('$codigo_pedido','$fecha_devolucion','$detalles')";
            $con=conectar();
            $query=mysqli_query($con,$sql);

            if($query){
                return(true);
            }else{
                return(false);
            }
        }

        public function getDevoluciones(){
            //include_once('SingletonConexionDB');
            $i = conexionSingleton::getInstance();
            $con = $i -> getConexion();
            $sql = "select * from Devolucion";
            $result = mysqli_query($con, $sql);

            return($result);
        }
    }
    

?>