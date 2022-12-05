<?php
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    $idcodigo;
    $json=array();
    $json1=array();
    if(isset($_POST["usuario"])){
        $codigo=NULL;
        $user=$_POST["usuario"];
        $code=rand(1000000000,9999999999);
        $correo;
        $conexion=mysqli_connect($hostname,$username,$password,$database);
        $consulta="SELECT * FROM `verificar` WHERE (`user` = '$user')";
        $resultado=mysqli_query($conexion,$consulta);
        if($registro1=mysqli_fetch_array($resultado)){
            $correo=$registro1["correo"];
        }
        $eliminar="DELETE FROM `verificar` WHERE (`user`='$user')";
        $resultado=mysqli_query($conexion,$eliminar);
        $insertar="INSERT INTO `codigo`(`id`, `correo`, `user`, `code`, `pase`) VALUES ('$codigo','$correo','$user','$code','1')";
        $resultado=mysqli_query($conexion,$insertar);
        $insertar="INSERT INTO `verificar`(`id`, `correo`, `user`, `code`) VALUES ('$codigo','$correo','$user','$code')";
        $resultado=mysqli_query($conexion,$insertar);
        mysqli_close($conexion);
        $resultar["validar"]="Enviado";
        $json['correo'][]=$resultar;
        echo json_encode($json);
    }
?>