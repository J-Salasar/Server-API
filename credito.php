<?php
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    $json=array();
    if(isset($_POST["usuario"]) && isset($_POST["recargar"])){
        $usuario=$_POST["usuario"];
        $recargar=$_POST["recargar"];
        $iduser;
        $cantidad;
        $total;
        $conexion=mysqli_connect($hostname,$username,$password,$database);
        $consultar="SELECT * FROM `cuentas` WHERE (`user`='$usuario')";
        $resultado=mysqli_query($conexion,$consultar);
        if($registro=mysqli_fetch_array($resultado)){
            $iduser=$registro["id"];
            $consultar="SELECT * FROM `personas` WHERE (`iduser`='$iduser')";
            $resultado=mysqli_query($conexion,$consultar);
            if($registro=mysqli_fetch_array($resultado)){
                $cantidad=$registro["dinero"];
                $total=$cantidad + $recargar;
                $insertar="UPDATE `personas` SET `dinero`='$total' WHERE (`iduser`='$iduser')";
                $resultado=mysqli_query($conexion,$insertar);
            }
        }
        $resultar["validar"]="Agregado";
        $json['usuario'][]=$resultar;
        echo json_encode($json);
    }   
?>