<?php
    date_default_timezone_set("America/El_Salvador");
    $hora=date("h").":".date("i").":".date("s").date("a");
    $fecha=date("j")."/".date("n")."/".date("Y");
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    if(isset($_POST["usuario"]) && isset($_POST["dinero"]) && isset($_POST["latitud"]) && isset($_POST["longitud"]) && isset($_POST["total"])){
        $user=$_POST["usuario"];
        $dinero=$_POST["dinero"];
        $latitud=$_POST["latitud"];
        $longitud=$_POST["longitud"];
        $total=$_POST["total"];
        $nombre;
        $id=NULL;
        $idcuenta;
        $apellido;
        $telefono;
        $correo;
        $idfactura;
        $idfacturacion_admin;
        $conexion=mysqli_connect($hostname,$username,$password,$database);
        $consulta="SELECT * FROM `cuentas` WHERE (`user`='$user')";
        $resultado=mysqli_query($conexion,$consulta);
        if($resultado){
            if($registro=mysqli_fetch_array($resultado)){
                $idcuenta=$registro["id"];
                $correo=$registro["correo"];
                $consulta="SELECT * FROM `personas` WHERE (`iduser`='$idcuenta')";
                $resultado=mysqli_query($conexion,$consulta);
                if($resultado){
                    if($registro=mysqli_fetch_array($resultado)){
                        $nombre=$registro["nombre"];
                        $apellido=$registro["apellido"];
                        $telefono=$registro["telefono"];
                        $insertar="INSERT INTO `factura`(`id`, `nombre`, `apellido`, `fecha`, `hora`, `latitud`, `longitud`, `telefono`, `total`, `usuario`) VALUES ('$id','$nombre','$apellido','$fecha','$hora','$latitud','$longitud','$telefono','$total', '$user')";
                        $resultado=mysqli_query($conexion,$insertar);
                        $consulta="SELECT * FROM `factura` WHERE (`fecha`='$fecha') AND (`hora`='$hora')";
                        $resultado=mysqli_query($conexion,$consulta);
                        if($registro){
                            if($registro=mysqli_fetch_array($resultado)){
                                $idfactura=$registro["id"];
                                $insertar="INSERT INTO `facturacion_admin`(`id`, `idfactura`) VALUES ('$id','$idfactura')";
                                $resultado=mysqli_query($conexion,$insertar);
                                $consulta="SELECT * FROM `facturacion_admin` WHERE (`idfactura`='$idfactura')";
                                $resultado=mysqli_query($conexion,$consulta);
                                if($resultado){
                                    if($registro=mysqli_fetch_array($resultado)){
                                        $idfacturacion_admin=$registro["id"];
                                        $insertar="UPDATE `personas` SET `dinero`='$dinero' WHERE (`iduser`='$idcuenta')";
                                        $resultado=mysqli_query($conexion,$insertar);
                                        $consulta="SELECT * FROM `carrito` WHERE (`usuario`='$user')";
                                        $resultado=mysqli_query($conexion,$consulta);
                                        if($resultado){
                                            while($registro=mysqli_fetch_assoc($resultado)){
                                                $id_carrito=$registro["id"];
                                                $nombre_carrito=$registro["nombre"];
                                                $cantidad_carrito=$registro["cantidad"];
                                                $precio_carrito=$registro["precio"];
                                                $insertar="INSERT INTO `productos_factura`(`id`, `nombre`, `cantidad`, `precio`, `idfactura`, `idfacturacion_admin`) VALUES ('$id','$nombre_carrito','$cantidad_carrito','$precio_carrito','$idfactura','$idfacturacion_admin')";
                                                $resultado1=mysqli_query($conexion,$insertar);
                                                $borrar="DELETE FROM `carrito` WHERE (`usuario`='$user') AND (`id`='$id_carrito')";
                                                $resultado1=mysqli_query($conexion,$borrar);
                                            }
                                            $insertar="INSERT INTO `codigo`(`id`, `correo`, `user`, `code`, `pase`) VALUES ('$id','$correo','Pedido','Proceso','4')";
                                            $resultado=mysqli_query($conexion,$insertar);
                                            $resultar["procesando"]="producto";
                                            $json['productos'][]=$resultar;
                                            echo json_encode($json);
                                            mysqli_close($conexion);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>