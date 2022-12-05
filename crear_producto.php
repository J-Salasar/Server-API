<?php
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    $json=array();
    if(isset($_POST["nombre"]) && isset($_POST["precio"]) && isset($_POST["cantidad"]) && isset($_POST["foto"])){
        $idcodigo=NULL;
        $precio=$_POST["precio"];
        $nombre=$_POST["nombre"];
        $cantidad=$_POST["cantidad"];
        $foto=$_POST["foto"];
        $conexion=mysqli_connect($hostname,$username,$password,$database);
        if($cantidad=="0"){
            $insertar="INSERT INTO `productos`(`id`, `nombre`, `precio`, `cantidad`, `foto`, `estado`) VALUES ('$id','$nombre','$precio','$cantidad','$foto','Agotado')";
            $resultado=mysqli_query($conexion,$insertar);
        }
        else{
            $insertar="INSERT INTO `productos`(`id`, `nombre`, `precio`, `cantidad`, `foto`, `estado`) VALUES ('$id','$nombre','$precio','$cantidad','$foto','Disponible')";
            $resultado=mysqli_query($conexion,$insertar);
        }
        $resultar["validar"]="Creado";
        $json['registro'][]=$resultar;
        echo json_encode($json);
        mysqli_close($conexion);
    }
?>