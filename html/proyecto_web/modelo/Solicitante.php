<?php
    include 'ConexionDB.php';
    function registrarSolicitante($nombre,$email,$telefono,$ruta_foto){
        try{
            $sql="insert into Solicitante(nombre,email,telefono,foto) values('$nombre','$email','$telefono','$ruta_foto')";
            //echo $sql;
            $con=conectar();
            $query=mysqli_query($con,$sql);
            
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
    
    function buscarSolicitante($codigo){
        $con=conectar();
        $sql="select * from Solicitante where codigo_solicitante='$codigo'";
        $result=mysqli_query($con, $sql);
        if(mysqli_num_rows($result) > 0){
            return(mysqli_fetch_array($result));
        }else{
            return(null);
        }
    }
    
    function modificarSolicitante($codigo,$nombre,$email,$tel){
        $con=conectar();
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

    function getSolicitantes(){
        $con=conectar();
        $sql="select * from Solicitante";
        $result=mysqli_query($con,$sql);
        mysqli_close($con);
        return($result);
    }

    function eliminarSolicitante($codigo){
        $con=conectar();
        $sql="delete from Solicitante where codigo_solicitante='$codigo'";
        $query=mysqli_query($con,$sql);
        mysqli_close($con);
        if($query){
            return(true);
        }else{
            return(false);
        }
        
    }
?>