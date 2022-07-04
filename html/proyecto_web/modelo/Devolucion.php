<?php
    function registrarDevolucion($codigo_pedido,$fecha_devolucion,$detalles){
        include_once('ConexionDB.php');
        //echo "$cod_articulo\t$nombre_articulo/t$cantidad\t$fecha";
        $sql="insert into Devolucion(codigo_pedido,fecha_devolucion,detalles) values ('$codigo_pedido','$fecha_devolucion','$detalles')";
        $con=conectar();
        $query=mysqli_query($con,$sql);

        if($query){
            return(true);
        }else{
            return(false);
        }
        mysqli_close($con);
    }

    function getDevoluciones(){
        include_once('ConexionDB.php');
        $con=conectar();
        $sql="select * from Devolucion";
        $result=mysqli_query($con,$sql);
        
        return($result);
    }

?>