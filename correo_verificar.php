<?php
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    $idcodigo;
    $json=array();
    $json1=array();
    if(isset($_POST["correo"]) && isset($_POST["usuario"])){
        $codigo=NULL;
        $usuario=$_POST["usuario"];
        $code=rand(1000000000,9999999999);
        $correo=$_POST["correo"];
        $conexion=mysqli_connect($hostname,$username,$password,$database);
        $insertar="INSERT INTO `codigo`(`id`, `correo`, `user`, `code`, `pase`) VALUES ('$codigo','$correo','$usuario','$code','1')";
        $resultado=mysqli_query($conexion,$insertar);
        if($resultado){
        }
        $insertar="INSERT INTO `verificar`(`id`, `correo`, `user`, `code`) VALUES ('$codigo','$correo','$usuario','$code')";
        $resultado=mysqli_query($conexion,$insertar);
        if($resultado){
            $resultar["validar"]="Correo de verificacion enviado";
            $json['correo'][]=$resultar;
            echo json_encode($json);
            mysqli_close($conexion);
        }
    }
?>