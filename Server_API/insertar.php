<?php
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    $idcodigo;
    $json=array();
    $json1=array();
    if(isset($_GET["usuario"]) && isset($_GET["clave"]) && isset($_GET["direccion"]) && isset($_GET["nombre"]) && isset($_GET["dni"])){
        $codigo=NULL;
        $user=$_GET["usuario"];
        $pass=$_GET["clave"];
        $direccion=$_GET["direccion"];
        $estado="Desactivado";
        $nombre=$_GET["nombre"];
        $dni=$_GET["dni"];
        $conexion=mysqli_connect($hostname,$username,$password,$database);
        $insertar="INSERT INTO `cuentas`(`id`, `user`, `password`, `correo`, `estado`) VALUES ('$codigo','$user','$pass','$direccion','$estado')";
        $resultado=mysqli_query($conexion,$insertar);
        if($resultado){
            $consulta="SELECT * FROM `cuentas` WHERE (`user` = '$user')";
            $resultado=mysqli_query($conexion,$consulta);
            if($registro1=mysqli_fetch_array($resultado)){
                $idcodigo=$registro1["id"];
                $json['usuario'][]=$registro1;
            }
            echo json_encode($json);
        }
        $insertar="INSERT INTO `personas`(`id`, `nombre`, `dni`, `iduser`, `dinero`) VALUES ('$codigo','$nombre','$dni','$idcodigo','10')";
        $resultado=mysqli_query($conexion,$insertar);
        if($resultado){
            $consulta="SELECT * FROM `personas` WHERE `nombre` = '$nombre'";
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