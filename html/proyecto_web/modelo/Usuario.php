<?php
    include 'ConexionDB.php';
    function validarUsuario($usuario, $password){
        $con=conectar();
        $sql="select * from Usuario where id_usuario='$usuario' and password='$password'";
        $query=mysqli_query($con,$sql);
        if(mysqli_num_rows($query)>0){
            return(true);
        }else{
            return(false);
        }
        mysqli_close($con);
    }
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
</body>
</html>