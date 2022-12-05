<?php
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    $json=array();
    if(isset($_POST["nombre"]) && isset($_POST["precio"]) && isset($_POST["cantidad"]) && isset($_POST["foto"]) && isset($_POST["usuario"]) && isset($_POST["cantidad_usuario"]) && isset($_POST["id"])){
        $codigo=NULL;
        $idcodigo=$_POST["id"];
        $user=$_POST["usuario"];
        $precio=$_POST["precio"];
        $nombre=$_POST["nombre"];
        $cantidad=$_POST["cantidad"];
        $cantidad_usuario=$_POST["cantidad_usuario"];
        $cantidad_usuario2;
        $foto=$_POST["foto"];
        $conexion=mysqli_connect($hostname,$username,$password,$database);
        $consulta="SELECT * FROM `carrito` WHERE (`nombre`='$nombre')";
        $resultado=mysqli_query($conexion,$consulta);
        if($resultado){
            if($registro=mysqli_fetch_array($resultado)){
                $cantidad_usuario2=$registro["cantidad"];
                $respuesta=$cantidad_usuario+$cantidad_usuario2;
                $insertar="UPDATE `carrito` SET `cantidad`='$respuesta' WHERE (`nombre`='$nombre')";
                $resultado=mysqli_query($conexion,$insertar);
                if($cantidad==0){
                    $insertar="UPDATE `productos` SET `cantidad`='$cantidad', `estado`='Agotado' WHERE (`nombre`='$nombre')";
                    $resultado=mysqli_query($conexion,$insertar);
                }
                else{
                    $insertar="UPDATE `productos` SET `cantidad`='$cantidad' WHERE (`nombre`='$nombre')";
                    $resultado=mysqli_query($conexion,$insertar);
                }
            }else{
                $insertar="INSERT INTO `carrito`(`id`, `nombre`, `cantidad`, `precio`, `foto`, `usuario`, `idproducto`) VALUES ('$codigo','$nombre','$cantidad_usuario','$precio','$foto','$user','$idcodigo')";
                $resultado=mysqli_query($conexion,$insertar);
                if($cantidad==0){
                    $insertar="UPDATE `productos` SET `cantidad`='$cantidad', `estado`='Agotado' WHERE (`nombre`='$nombre')";
                    $resultado=mysqli_query($conexion,$insertar);
                }
                else{
                    $insertar="UPDATE `productos` SET `cantidad`='$cantidad' WHERE (`nombre`='$nombre')";
                    $resultado=mysqli_query($conexion,$insertar);
                }
            }
            $resultar["validar"]="Registrado";
            $json['registro'][]=$resultar;
            echo json_encode($json);
            mysqli_close($conexion);
        }
    }
?>