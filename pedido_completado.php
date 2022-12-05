<?php
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    if(isset($_POST["id"])){
        $idfactura=$_POST["id"];
        $user;
        $correo;
        $conexion=mysqli_connect($hostname,$username,$password,$database);
        $insertar="INSERT INTO `historial_facturacion_admin`(`id`, `idfactura`) VALUES ('$idfactura','$idfactura')";
        $resultado=mysqli_query($conexion,$insertar);
        $insertar="INSERT INTO `facturacion_repartidor`(`id`, `idfactura`) VALUES ('$idfactura','$idfactura')";
        $resultado=mysqli_query($conexion,$insertar);
        $borrar="DELETE FROM `facturacion_admin` WHERE (`idfactura`='$idfactura')";
        $resultado=mysqli_query($conexion,$borrar);
        if($resultado){
            $consulta="SELECT * FROM `factura` WHERE (`id`='$idfactura')";
            $resultado=mysqli_query($conexion,$consulta);
            if($registro=mysqli_fetch_array($resultado)){
                $user=$registro["usuario"];
                $consulta="SELECT * FROM `cuentas` WHERE (`user`='$user')";
                $resultado=mysqli_query($conexion,$consulta);
                if($registro=mysqli_fetch_array($resultado)){
                    $correo=$registro["correo"];
                }
            }
            $insertar="INSERT INTO `codigo`(`id`, `correo`, `user`, `code`, `pase`) VALUES ('$id','$correo','Pedido','Enviado','5')";
            $resultado=mysqli_query($conexion,$insertar);
            $resultar["respuesta"]="Aceptada";
            $json['productos'][]=$resultar;
        }
        echo json_encode($json);
        mysqli_close($conexion);
    }
?>