<?php
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    $json=array();
    if(isset($_GET["user"]) && isset($_GET["correo"])){
        $user=$_GET["user"];
        $correo=$_GET["correo"];
        $user1;
        $correo1;
        $conexion=mysqli_connect($hostname,$username,$password,$database);
        $consulta="SELECT `user` FROM `cuentas` WHERE (`user`='$user')";
        $resultado=mysqli_query($conexion,$consulta);
        if($registro=mysqli_fetch_array($resultado)){
            $user1="s";
            $consulta="SELECT `correo` FROM `cuentas` WHERE (`correo`='$correo')";
            $resultado1=mysqli_query($conexion,$consulta);
            if($registro1=mysqli_fetch_array($resultado1)){
                $correo1="s";
            }
            else{
                $correo1="n";
            }
        }
        else{
            $user1="n";
            $consulta="SELECT `correo` FROM `cuentas` WHERE (`correo`='$correo')";
            $resultado1=mysqli_query($conexion,$consulta);
            if($registro1=mysqli_fetch_array($resultado1)){
                $correo1="s";
            }
            else{
                $correo1="n";
            }
        }
        $resultar["user"]=$user1;
        $resultar["correo"]=$correo1;
        $json['usuario'][]=$resultar;
        echo json_encode($json);
        mysqli_close($conexion);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Consultar</title>
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