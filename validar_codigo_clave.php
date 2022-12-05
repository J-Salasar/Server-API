<?php
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    $json=array();
    if(isset($_POST["correo"]) && isset($_POST["codigo"]) && isset($_POST["clave"])){
        $code=$_POST["codigo"];
        $correo=$_POST["correo"];
        $clave=$_POST["clave"];
        $conexion=mysqli_connect($hostname,$username,$password,$database);
        $consulta="SELECT `code` FROM `rclave` WHERE (`correo`='$correo')";
        $resultado=mysqli_query($conexion,$consulta);
        if($resultado){
            if($registro1=mysqli_fetch_array($resultado)){
                $codev=$registro1["code"];
                if($codev==$code){
                    $actualizar="UPDATE `cuentas` SET `password`='$clave' WHERE (`correo`='$correo')";
                    $resultado=mysqli_query($conexion,$actualizar);
                    $resultar["user"]="guardado";
                    $json['usuario'][]=$resultar;
                    echo json_encode($json);
                    $borrar="DELETE FROM `rclave` WHERE (`correo`='$correo')";
                    $resultado=mysqli_query($conexion,$borrar);
                }
                else{
                    $resultar["user"]="denegado";
                    $json['usuario'][]=$resultar;
                    echo json_encode($json);
                }
            }
            else{
                $resultar["user"]="denegado";
                $json['usuario'][]=$resultar;
                echo json_encode($json);
            }
        }
        else{
            $resultar["user"]="denegado";
            $json['usuario'][]=$resultar;
            echo json_encode($json);
        }
        mysqli_close($conexion);
    }
?>