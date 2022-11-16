<?php
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    $idcodigo;
    $json=array();
    $json1=array();
    if(isset($_GET["correo"])){
        $codigo=NULL;
        $user="Clave";
        $code=rand(1000000000,9999999999);
        $correo=$_GET["correo"];
        $conexion=mysqli_connect($hostname,$username,$password,$database);
        $consulta="SELECT * FROM `cuentas` WHERE(`correo`='$correo')";
        $resultado=mysqli_query($conexion,$consulta);
        if($resultado){
            if($registro1=mysqli_fetch_array($resultado)){
                $borrar="DELETE FROM `rclave` WHERE (`correo`='$correo')";
                $resultado=mysqli_query($conexion,$borrar);
                $insertar="INSERT INTO `codigo`(`id`, `correo`, `user`, `code`, `pase`) VALUES ('$codigo','$correo','$user','$code','3')";
                $resultado=mysqli_query($conexion,$insertar);
                if($resultado){
                    $consulta="SELECT * FROM `codigo` WHERE (`user` = '$user')";
                    $resultado=mysqli_query($conexion,$consulta);
                    if($registro1=mysqli_fetch_array($resultado)){
                        $json['usuario'][]=$registro1;
                    }
                    echo json_encode($json);
                }
                $insertar="INSERT INTO `rclave`(`id`, `correo`, `code`) VALUES ('$codigo','$correo','$code')";
                $resultado=mysqli_query($conexion,$insertar);
                if($resultado){
                    $consulta="SELECT * FROM `rclave` WHERE `user` = '$user'";
                    $resultado=mysqli_query($conexion,$consulta);
                    if($registro2=mysqli_fetch_array($resultado)){
                        $json1['informacion'][]=$registro2;
                    }
                    echo json_encode($json1);
                }
            }
            else{
                $resultar["nombre"]="No enviado";
                $resultar["correo"]="No enviado";
                $json['usuario'][]=$resultar;
                echo json_encode($json);
            }
        }
        else{
            $resultar["nombre"]="No enviado";
            $resultar["correo"]="No enviado";
            $json['usuario'][]=$resultar;
            echo json_encode($json);
        }
        mysqli_close($conexion);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registro</title>
    </head>
    <body>
        <header>
            <h1>Que hase un terrorista vergotas en mi puta pagina...</h1>
            </header>
        <nav></nav>
        <section>
            <article></article>
        </section>
        <aside></aside>
        <footer></footer>
    </body>
</html>