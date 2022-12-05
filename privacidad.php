<?php
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    $json=array();
    if(isset($_POST["usuario"])){
        $user=$_POST["usuario"];
        $iduser;
        $clave;
        $correo;
        $nombre;
        $telefono;
        $foto;
        $conexion=mysqli_connect($hostname,$username,$password,$database);
        $consulta="SELECT * FROM `cuentas` WHERE (`user`='$user')";
        $resultado=mysqli_query($conexion,$consulta);
        if($registro=mysqli_fetch_array($resultado)){
            $iduser=$registro["id"];
            $clave=$registro["password"];
            $correo=$registro["correo"];
            $consulta="SELECT * FROM `personas` WHERE (`iduser`='$iduser')";
            $resultado=mysqli_query($conexion,$consulta);
            if($registro=mysqli_fetch_array($resultado)){
                $nombre=$registro["nombre"]." ".$registro["apellido"];
                $telefono=$registro["telefono"];
                $foto=$registro["foto"];
            }
            $resultar["clave"]=$clave;
            $resultar["correo"]=$correo;
            $resultar["nombre"]=$nombre;
            $resultar["telefono"]=$telefono;
            $resultar["foto"]=$foto;
            $json['informacion'][]=$resultar;
            echo json_encode($json);
            mysqli_close($conexion);
        }
    }
?>