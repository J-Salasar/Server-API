<?php
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    if(isset($_POST["usuario"])){
        $user=$_POST["usuario"];
        $conexion=mysqli_connect($hostname,$username,$password,$database);
        $consulta="SELECT * FROM `factura` WHERE (`usuario`='$user')";
        $resultado=mysqli_query($conexion,$consulta);
        if($resultado){
            while($registro=mysqli_fetch_assoc($resultado)){
                $resultar["id"]=$registro["id"];
                $resultar["nombre"]=$registro["nombre"];
                $resultar["apellido"]=$registro["apellido"];
                $resultar["fecha"]=$registro["fecha"];
                $resultar["hora"]=$registro["hora"];
                $resultar["latitud"]=$registro["latitud"];
                $resultar["longitud"]=$registro["longitud"];
                $resultar["telefono"]=$registro["telefono"];
                $resultar["total"]=$registro["total"];
                $json['factura'][]=$resultar;
            }
            echo json_encode($json);
            mysqli_close($conexion);
        }
    }
?>