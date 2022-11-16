<?php
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    $idcodigo;
    $json=array();
    $json1=array();
    if(isset($_GET["user"])){
        $codigo=NULL;
        $user=$_GET["user"];
        $code=rand(1000000000,9999999999);
        $correo;
        $conexion=mysqli_connect($hostname,$username,$password,$database);
        $consulta="SELECT * FROM `verificar` WHERE (`user` = '$user')";
        $resultado=mysqli_query($conexion,$consulta);
        if($registro1=mysqli_fetch_array($resultado)){
            $correo=$registro1["correo"];
        }
        $eliminar="DELETE FROM `verificar` WHERE (`user`='$user')";
        $resultado=mysqli_query($conexion,$eliminar);
        $insertar="INSERT INTO `codigo`(`id`, `correo`, `user`, `code`, `pase`) VALUES ('$codigo','$correo','$user','$code','1')";
        $resultado=mysqli_query($conexion,$insertar);
        if($resultado){
            $consulta="SELECT * FROM `codigo` WHERE (`user` = '$user')";
            $resultado=mysqli_query($conexion,$consulta);
            if($registro1=mysqli_fetch_array($resultado)){
                $json['usuario'][]=$registro1;
            }
            echo json_encode($json);
        }
        $insertar="INSERT INTO `verificar`(`id`, `correo`, `user`, `code`) VALUES ('$codigo','$correo','$user','$code')";
        $resultado=mysqli_query($conexion,$insertar);
        if($resultado){
            $consulta="SELECT * FROM `verificar` WHERE `user` = '$user'";
            $resultado=mysqli_query($conexion,$consulta);
            if($registro2=mysqli_fetch_array($resultado)){
                $json1['informacion'][]=$registro2;
            }
            echo json_encode($json1);
            mysqli_close($conexion);
        }
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