<?php
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    if(isset($_GET["codigo"])){
        if($_GET["codigo"]=="0123456789"){
            $numero;
            $conexion=mysqli_connect($hostname,$username,$password,$database);
            $consulta="SELECT * FROM `facturacion_admin`";
            $resultado=mysqli_query($conexion,$consulta);
            if($resultado){
                while($registro=mysqli_fetch_assoc($resultado)){
                    $numero=$registro["idfactura"];
                    $consulta2="SELECT * FROM `factura` WHERE (`id`='$numero')";
                    $resultado1=mysqli_query($conexion,$consulta2);
                    if($registro1=mysqli_fetch_array($resultado1)){
                        $resultar["id"]=$registro1["id"];
                        $resultar["nombre"]=$registro1["nombre"];
                        $resultar["apellido"]=$registro1["apellido"];
                        $resultar["fecha"]=$registro1["fecha"];
                        $resultar["hora"]=$registro1["hora"];
                        $resultar["latitud"]=$registro1["latitud"];
                        $resultar["longitud"]=$registro1["longitud"];
                        $resultar["telefono"]=$registro1["telefono"];
                        $resultar["total"]=$registro1["total"];
                        $json['factura'][]=$resultar;
                    }
                }
                echo json_encode($json);
                mysqli_close($conexion);
            }
        }
    }
?>