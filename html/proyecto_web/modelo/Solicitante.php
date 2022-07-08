<?php

    class Solicitante
    {
        public function registrarSolicitante($nombre, $email, $telefono, $ruta_foto){
            try{
                include_once('SingletonConexionDB.php');
                $i = conexionSingleton::getInstance();
                $con = $i -> getConexion();
                
                $sql = "insert into Solicitante(nombre,email,telefono,foto) values('$nombre','$email','$telefono','$ruta_foto')";
                $query = mysqli_query($con,$sql);

                if($query){
                    return(true);
                }else{
                    return(false);
                } 
            }catch(MySQLException $e){
                echo "error: $e";
            }
            mysqli_close($con);
        }

        public function isUsed($codigo){
            include_once('SingletonConexionDB.php');
            $i = conexionSingleton::getInstance();
            $con = $i -> getConexion();
            $sql = "select * from Pedido where codigo_solicitante='$codigo'";
            $result = mysqli_query($con, $sql);
            if(mysqli_num_rows($result) > 0){
                return(true);
            }else{
                return(false);
            }
        }

        public function buscarSolicitante($codigo){
            include_once('SingletonConexionDB.php');
            $i = conexionSingleton::getInstance();
            $con = $i -> getConexion();
            $sql="select * from Solicitante where codigo_solicitante='$codigo'";
            $result=mysqli_query($con, $sql);
            if(mysqli_num_rows($result) > 0){
                return(mysqli_fetch_array($result));
            }else{
                return(null);
            }
        }

        public function modificarSolicitante($codigo,$nombre,$email,$tel){
            include_once('SingletonConexionDB.php');
            $i = conexionSingleton::getInstance();
            $con = $i -> getConexion();
            $sql="update Solicitante set nombre='$nombre',email='$email',telefono='$tel' where codigo_solicitante='$codigo'";
            //echo $sql."<br>";
            $query=mysqli_query($con,$sql);
            mysqli_close($con);
            if($query){
                return(true);
            }else{
                return(false);
            }

        }

        public function getSolicitantes(){
            include_once('SingletonConexionDB.php');
            $i = conexionSingleton::getInstance();
            $con = $i -> getConexion();
            $sql="select * from Solicitante";
            $result=mysqli_query($con,$sql);
            mysqli_close($con);
            return($result);
        }

        public function eliminarSolicitante($codigo){
            include_once('SingletonConexionDB.php');
            $i = conexionSingleton::getInstance();
            $con = $i -> getConexion();
            $sql="delete from Solicitante where codigo_solicitante='$codigo'";
            $query=mysqli_query($con,$sql);
            mysqli_close($con);
            if($query){
                return(true);
            }else{
                return(false);
            }

        }    
    }

    
?>