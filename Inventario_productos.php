<?php
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    if(isset($_GET["codigo"])){
        if($_GET["codigo"]=="0123456789"){
            $conexion=mysqli_connect($hostname,$username,$password,$database);
            $consulta="SELECT * FROM `productos`";
            $resultado=mysqli_query($conexion,$consulta);
            if($resultado){
                while($registro=mysqli_fetch_assoc($resultado)){
                    $resultar["id"]=$registro["id"];
                    $resultar["nombre"]=$registro["nombre"];
                    $resultar["precio"]=$registro["precio"];
                    $resultar["cantidad"]=$registro["cantidad"];
                    $resultar["foto"]=$registro["foto"];
                    $json['productos'][]=$resultar;
                }
                echo json_encode($json);
                mysqli_close($conexion);
            }
        }
    }
?>