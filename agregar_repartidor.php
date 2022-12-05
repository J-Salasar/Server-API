<?php
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    $json=array();
    if(isset($_POST["usuario"])){
        $usuario=$_POST["usuario"];
        $user;
        $conexion=mysqli_connect($hostname,$username,$password,$database);
        $insertar="UPDATE `cuentas` SET `rango`='Repartidor' WHERE (`user`='$usuario')";
        $resultado=mysqli_query($conexion,$insertar);
        $resultar["validar"]="Agregado";
        $json['usuario'][]=$resultar;
        echo json_encode($json);
    }   
?>