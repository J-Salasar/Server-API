<?php
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    $json=array();
    if(isset($_POST["usuario"])&&isset($_POST["telefono"])&&isset($_POST["foto"])&&isset($_POST["clave"])){
        $user=$_POST["usuario"];
        $iduser;
        $clave=$_POST["clave"];
        $telefono=$_POST["telefono"];
        $foto=$_POST["foto"];
        $conexion=mysqli_connect($hostname,$username,$password,$database);
        $consulta="SELECT * FROM `cuentas` WHERE (`user`='$user')";
        $resultado=mysqli_query($conexion,$consulta);
        if($registro=mysqli_fetch_array($resultado)){
            $iduser=$registro["id"];
            $insertar="UPDATE `cuentas` SET `password`='$clave' WHERE (`user`='$user')";
            $resultado=mysqli_query($conexion,$insertar);
            $insertar="UPDATE `personas` SET `telefono`='$telefono',`foto`='$foto' WHERE (`iduser`='$iduser')";
            $resultado=mysqli_query($conexion,$insertar);
            $resultar["informacion"]="actualizado";
            $json['informacion'][]=$resultar;
            echo json_encode($json);
            mysqli_close($conexion);
        }
    }
?>