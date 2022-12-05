<?php
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    $json=array();
    if(isset($_POST["usuario"])){
        $usuario=$_POST["usuario"];
        $usuario1;
        $estado1;
        $conexion=mysqli_connect($hostname,$username,$password,$database);
        $consulta="SELECT * FROM `cuentas` WHERE (`user`='$usuario')";
        $resultado=mysqli_query($conexion,$consulta);
        if($registro=mysqli_fetch_array($resultado)){
            $usuario1=$registro["user"];
            if(($usuario==$usuario1)){
                $estado1="denegado";
            }
            else{
                $estado1="denegado";
            }
        }
        else{
            $estado1="aprobado";
        }

        $resultar["validar"]=$estado1;
        $json['usuario'][]=$resultar;
        echo json_encode($json);
        mysqli_close($conexion);
    }
?>