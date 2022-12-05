<?php
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    $json=array();
    if(isset($_POST["correo"])){
        $codigo=NULL;
        $user="Usuario";
        $code=rand(100000,999999);
        $correo=$_POST["correo"];
        $conexion=mysqli_connect($hostname,$username,$password,$database);
        $consulta="SELECT * FROM `cuentas` WHERE(`correo`='$correo')";
        $resultado=mysqli_query($conexion,$consulta);
        if($resultado){
            if($registro1=mysqli_fetch_array($resultado)){
                $borrar="DELETE FROM `rcorreo` WHERE (`correo`='$correo')";
                $resultado=mysqli_query($conexion,$borrar);
                $insertar="INSERT INTO `codigo`(`id`, `correo`, `user`, `code`, `pase`) VALUES ('$codigo','$correo','$user','$code','2')";
                $resultado=mysqli_query($conexion,$insertar);
                $insertar="INSERT INTO `rcorreo`(`id`, `correo`, `code`) VALUES ('$codigo','$correo','$code')";
                $resultado=mysqli_query($conexion,$insertar);
                $resultar["correo"]="Enviado";
                $json["usuario"][]=$resultar;
                echo json_encode($json);
            }
            else{
                $resultar["correo"]="No enviado";
                    $json["usuario"][]=$resultar;
                    echo json_encode($json);
            }
        }
        else{
            $resultar["correo"]="No enviado";
                $json["usuario"][]=$resultar;
                echo json_encode($json);
        }
        mysqli_close($conexion);
    }
?>