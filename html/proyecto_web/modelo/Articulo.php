<?php
    include 'ConexionDB.php';
    include 'SingletonConexionDB.php';
    
    function registrarArticulo($nombre,$cantidad,$fecha){
        try{
            //echo "$cod_articulo\t$nombre_articulo/t$cantidad\t$fecha";
            $sql="INSERT INTO Articulo(nombre,cantidad,fecha_registro) values ('$nombre',$cantidad,'$fecha')";
            $con=conectar();
            $query=mysqli_query($con,$sql);
            
            if($query){
                return(true);
                mysqli_close($con);
            }else{
                return(false);
                mysqli_close($con);
            }
            
        }catch(MySQLException $e){
            echo "error: $e";
        }
        
    }
    
    function isUsedArticulo($codigo){
        $con = conectar();
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

    function getArticulos(){
        $con=conectar();
        $sql="select * from Articulo";
        $result=mysqli_query($con,$sql);
        return($result);
    }
    
    function buscarArticulo($codigo){
        $con=conectar();
        $sql="select * from Articulo where codigo='$codigo'";
        $result=mysqli_query($con,$sql);
        
        if(mysqli_num_rows($result)>0){
            return(mysqli_fetch_array($result));
        }else{
            return(null);
        }
    }

    function modificarArticulo($codigo,$nombre,$cantidad,$fecha){
        $con=conectar();
        //$sql="update Articulo set nombre='$nombre',cantidad=$cantidad,fecha_registro='$fecha' where codigo='$codigo'";
        $sql="update Articulo set nombre='$nombre',cantidad=$cantidad where codigo='$codigo'";
        //echo $sql."<br>";
        $query=mysqli_query($con,$sql);
        if($query){
            return(true);
        }else{
            return(false);
        }
        mysqli_close($con);
    }

    function eliminarArticulo($codigo){
        $con=conectar();
        $sql="delete from Articulo where codigo='$codigo'";
        $query=mysqli_query($con,$sql);
        if($query){
            return(true);
        }else{
            return(false);
        }
        mysqli_close($con);
    }
