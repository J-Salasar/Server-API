<?php
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    if(isset($_POST["id"])){
        $id=$_POST["id"];
        $conexion=mysqli_connect($hostname,$username,$password,$database);
        $consulta="SELECT * FROM `productos_factura` WHERE (`idfactura`='$id')";
        $resultado=mysqli_query($conexion,$consulta);
        if($resultado){
            while($registro=mysqli_fetch_assoc($resultado)){
                $resultar["nombre"]=$registro["nombre"];
                $resultar["cantidad"]=$registro["cantidad"];
                $resultar["precio"]=$registro["precio"];
                $json['producto'][]=$resultar;
            }
            echo json_encode($json);
            mysqli_close($conexion);
        }
    }
?>