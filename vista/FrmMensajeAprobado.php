<?php
    function frmMensajeAprobadoShow($titulo,$mensaje,$enlace){
        ?>
        <!doctype html>
        <html>
        <head>
        <meta charset="utf-8">
        <title><?php echo $titulo?></title>
        </head>

                <body>
                    <table width="374" border="0" align="center">
          <tbody>
            <tr>
              <td width="352" height="27" align="center" valign="middle" bgcolor="#BEFFBD"><b><?php echo $titulo ?></b></td>
            </tr>
            <tr>
              <td height="27" align="center" valign="middle"><?php echo $mensaje ?></td>
            </tr>
              <?php 
                for($i=0;$i<count($enlace);$i++){
                    ?>
                    <tr>
                        <td height="26" align="right" valign="middle"><?php echo $enlace[$i]?></td>
                    </tr>
              <?php
                }
              ?>


          </tbody>
        </table>

        </body>
        </html>
    <?php
    }
?>


