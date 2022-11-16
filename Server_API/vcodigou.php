<?php
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    $json=array();
    if(isset($_GET["correo"]) && isset($_GET["codigo"])){
        $code=$_GET["codigo"];
        $correo=$_GET["correo"];
        $conexion=mysqli_connect($hostname,$username,$password,$database);
        $consulta="SELECT `code` FROM `rcorreo` WHERE (`correo`='$correo')";
        $resultado=mysqli_query($conexion,$consulta);
        if($resultado){
            if($registro1=mysqli_fetch_array($resultado)){
                $codev=$registro1["code"];
                if($codev==$code){
                    $consulta="SELECT `user` FROM `cuentas` WHERE (`correo`='$correo')";
                    $resultado=mysqli_query($conexion,$consulta);
                    if($resultado){
                        if($registro1=mysqli_fetch_array($resultado)){
                            $json['usuario'][]=$registro1;
                            echo json_encode($json);
                            $borrar="DELETE FROM `rcorreo` WHERE (`correo`='$correo')";
                            $resultado=mysqli_query($conexion,$borrar);
                        }
                    }
                    else{
                        $resultar["user"]="XXXXXXXXXX";
                        $json['usuario'][]=$resultar;
                        echo json_encode($json);
                    }
                }
                else{
                    $resultar["user"]="XXXXXXXXXX";
                    $json['usuario'][]=$resultar;
                    echo json_encode($json);
                }
            }
            else{
                $resultar["user"]="XXXXXXXXXX";
                $json['usuario'][]=$resultar;
                echo json_encode($json);
            }
        }
        else{
            $resultar["user"]="XXXXXXXXXX";
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