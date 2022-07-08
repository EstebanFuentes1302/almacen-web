<?php
    include 'SingletonConexionDB.php';

    class Usuario
    {
        public function validarUsuario($usuario, $password){

            $i = conexionSingleton::getInstance();
            $con = $i -> getConexion();

            $sql = "select * from Usuario where id_usuario='$usuario' and password='$password'";
            $query = mysqli_query($con, $sql);
            if(mysqli_num_rows($query) > 0){
                return(true);
            }else{
                return(false);
            }
        }
        
    }
    
?>