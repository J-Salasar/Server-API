<?php
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    $json=array();
    if(isset($_POST["usuario"])){
        $user=$_POST["usuario"];
        $idcodigo;
        $nombre;
        $foto;
        $dinero;
        $conexion=mysqli_connect($hostname,$username,$password,$database);
        $consulta="SELECT `id` FROM `cuentas` WHERE (`user`='$user')";
        $resultado=mysqli_query($conexion,$consulta);
        if($resultado){
            if($registro=mysqli_fetch_array($resultado)){
                $idcodigo=$registro["id"];
            }
        }
        $consulta="SELECT `nombre`, `apellido`, `foto`, `dinero` FROM `personas` WHERE (`iduser`='$idcodigo')";
        $resultado=mysqli_query($conexion,$consulta);
        if($resultado){
            if($registro=mysqli_fetch_array($resultado)){
                $resultar["nombre"]=$registro["nombre"];
                $resultar["apellido"]=$registro["apellido"];
                $resultar["foto"]=$registro["foto"];
                $resultar["dinero"]=$registro["dinero"];
                $json['usuario'][]=$resultar;
                echo json_encode($json);
            }
            mysqli_close($conexion);
        }
    }
?>