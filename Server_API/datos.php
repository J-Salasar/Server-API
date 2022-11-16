<?php
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    $json=array();
    if(isset($_GET["user"])){
        $user=$_GET["user"];
        $id;
        $dinero;
        $nombre;
        $conexion=mysqli_connect($hostname,$username,$password,$database);
        $consulta="SELECT `id` FROM `cuentas` WHERE (`user`='$user')";
        $resultado=mysqli_query($conexion,$consulta);
        if($registro=mysqli_fetch_array($resultado)){
            $id=$registro["id"];
            $consulta1="SELECT `nombre`, `dinero` FROM `personas` WHERE (`iduser`='$id')";
            $resultado=mysqli_query($conexion,$consulta1);
            if($registro1=mysqli_fetch_array($resultado)){
                $nombre=$registro1["nombre"];
                $dinero=$registro1["dinero"];
            }
        }
        $resultar["nombre"]=$nombre;
        $resultar["dinero"]=$dinero;
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