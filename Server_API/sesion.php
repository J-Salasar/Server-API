<?php
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    $json=array();
    if(isset($_GET["user"]) && isset($_GET["clave"])){
        $user=$_GET["user"];
        $clave=$_GET["clave"];
        $user1;
        $clave1;
        $estado1;
        $conexion=mysqli_connect($hostname,$username,$password,$database);
        $consulta="SELECT `user`, `password`, `estado` FROM `cuentas` WHERE (`user`='$user') AND (`password`='$clave')";
        $resultado=mysqli_query($conexion,$consulta);
        if($registro=mysqli_fetch_array($resultado)){
            $estado=$registro["estado"];
            $user1="s";
            $clave1="s";
            if("Activo"==$estado){
                $estado1="s";
            }
            else{
                $estado1="n";
            }
        }
        else{
            $user1="n";
            $clave1="n";
            $estado1="n";
        }
        $resultar["user"]=$user1;
        $resultar["clave"]=$clave1;
        $resultar["estado"]=$estado1;
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