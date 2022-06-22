<?php
    function conectar(){
        $conexion=mysqli_connect('8.12.17.20','esteban','123','bd_almacen');
        return($conexion);
    }
?>