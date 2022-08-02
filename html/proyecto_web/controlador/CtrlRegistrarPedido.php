<?php
    session_start();
    $sesion=$_SESSION['usuario'];

    if($sesion!=null){
        $articulos = $_POST['articulos'];
        $cod_solicitante=$_POST['cod_solicitante'];
        $fecha = str_replace("/","-",$_POST['date']); 
        $estado = $_POST['estado'];
        if(isset($articulos) && isset($cod_solicitante) && isset($estado)){
            include_once('../modelo/Pedido.php');
            $p = new Pedido;
            $codigo_pedido = $p -> registrarPedido($cod_solicitante,$estado,$fecha);
            if($codigo_pedido != null){
                include_once('../modelo/RelPedidoArticulo.php');
                $r = new RelPedidoArticulo;
                $verif = true;
                $arr = json_decode($articulos);
                foreach($arr as $articulo){
                    $v = $r -> registrarRelPedidoArticulo($codigo_pedido, $articulo->codigo_articulo, $articulo->cantidad);
                    if($v == false){
                        $verif = false;
                    }
                }
                if($verif == true){
                    echo json_encode('true');
                }else{
                    echo json_encode('false');
                }
            }else{
                echo json_encode('false');
            }
        }else{
            echo json_encode('false');
        }
    }else{
        include_once('../vista/FrmMensaje.php');
        frmMensajeShow("Acceso Denegado, no ha iniciado sesión","<a href='../controlador/CtrlShowLogin.php?r=value'>Inicio de sesión</a>");
        die();
    }
    
    
?>