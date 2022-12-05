<?php
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    if(isset($_GET["codigo"])){
        if($_GET["codigo"]=="0123456789"){
            $conexion=mysqli_connect($hostname,$username,$password,$database);
            $consulta="SELECT `id`, `nombre`, `cantidad`, `precio`, `foto`, `usuario`, (SELECT `cantidad` FROM `productos` b WHERE (b.id = a.idproducto)) AS `idproducto` FROM `carrito` a";
            $resultado=mysqli_query($conexion,$consulta);
            if($resultado){
                while($registro=mysqli_fetch_assoc($resultado)){
                    $resultar["id"]=$registro["id"];
                    $resultar["nombre"]=$registro["nombre"];
                    $resultar["precio"]=$registro["precio"];
                    $resultar["cantidad"]=$registro["cantidad"];
                    $resultar["foto"]=$registro["foto"];
                    $resultar["cantidad_actual"]=$registro["idproducto"];
                    $json['productos'][]=$resultar;
                }
                echo json_encode($json);
                mysqli_close($conexion);
            }
        }
    }
?>