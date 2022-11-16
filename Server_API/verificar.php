<?php
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    $userV;
    $codeV;
    if(isset($_GET["usuario"]) && isset($_GET["codigo"])){
        $user=$_GET["usuario"];
        $code=$_GET["codigo"];
        $conexion=mysqli_connect($hostname,$username,$password,$database);
        $insertar="SELECT `user`,`code` FROM `verificar` WHERE (`user`='$user')";
        $resultado=mysqli_query($conexion,$insertar);
        if($resultado){
            if($registro1=mysqli_fetch_array($resultado)){
                $userV=$registro1["user"];
                $codeV=$registro1["code"];
                if($user==$userV){
                    if($code==$codeV){
                        $insertar="UPDATE `cuentas` SET `estado`='Activo' WHERE (`user`='$userV')";
                        $resultado=mysqli_query($conexion,$insertar);
                        $insertar="DELETE FROM `verificar` WHERE (`user`='$userV')";
                        $resultado=mysqli_query($conexion,$insertar);
                        mysqli_close($conexion);
                    }
                }
            }
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
            <h1>Enhorabuena! ya verificastes tu cuenta, ahora puedes usar las funciones de la aplicacion</h1>
            </header>
        <nav></nav>
        <section>
            <article></article>
        </section>
        <aside></aside>
        <footer></footer>
    </body>
</html>