<?php
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    $json=array();
    if(isset($_POST["correo"])){
        $correo=$_POST["correo"];
        $correo1;
        $estado1;
        $conexion=mysqli_connect($hostname,$username,$password,$database);
        $consulta="SELECT * FROM `cuentas` WHERE (`correo`='$correo')";
        $resultado=mysqli_query($conexion,$consulta);
        if($registro=mysqli_fetch_array($resultado)){
            $correo1=$registro["correo"];
            if(($correo==$correo1)){
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
        $json['correo'][]=$resultar;
        echo json_encode($json);
        mysqli_close($conexion);
    }
?>