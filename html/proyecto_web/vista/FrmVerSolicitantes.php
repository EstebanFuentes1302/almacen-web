<?php
    function frmVerSolicitantesShow($solicitantes){
    ?>
        <!doctype html>
        <html>
        <head>
        <meta charset="utf-8">
            <link rel="stylesheet" href="../css/style.css">
        <title>Solicitantes</title>
        </head>
        <body>
            <div class="topPanel">
                <a class="back" href="../controlador/CtrlShowMenuSolicitante.php">&lt; Volver al Menú</a>
                <a class="logout" href="../controlador/CtrlLogout.php">Cerrar Sesión</a>
            </div>
        <h1 align="center">Solicitantes Registrados</h1>
            <div class="div-ver">
                <table class="tblShow">
                    <tr>
                        <td class="txtHeader" width="116" height="27" align="center" valign="middle">Código</td>
                        <td class="txtHeader" width="169" align="center" valign="middle">Nombre</td>
                        <td class="txtHeader" width="159" align="center" valign="middle">Correo</td>
                        <td class="txtHeader" width="138" align="center" valign="middle">Teléfono</td>
                        <td class="txtHeader" width="151" align="center" valign="middle">Foto</td>
                    </tr>
                    <?php
                        while($array=mysqli_fetch_array($solicitantes)){
                    ?>
                        <tr>
                            <td class="txtRow" height="60" align="center" valign="middle"><?php echo $array['codigo_solicitante']?></td>
                            <td class="txtRow" align="center" valign="middle"><?php echo $array['nombre']?></td>
                            <td class="txtRow" align="center" valign="middle"><?php echo $array['email']?></td>
                            <td class="txtRow" align="center" valign="middle"><?php echo $array['telefono']?></td>
                            <td class="txtRow" align="center" valign="middle"><img src="<?php echo $array['foto']?>" width="60px" height="80px"></td>
                        </tr>
                    <?php                
                        }
                    ?>
                </table>    
            </div>
        </body>
        </html>
    <?php
    }

?>

