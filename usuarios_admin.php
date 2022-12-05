<?php
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    if(isset($_GET["codigo"])){
        if($_GET["codigo"]=="0123456789"){
            $conexion=mysqli_connect($hostname,$username,$password,$database);
            $consulta="SELECT `nombre`, `apellido`, `foto`, (SELECT `user` FROM `cuentas` b WHERE (b.id = a.iduser)) AS `user`, (SELECT `rango` FROM `cuentas` b WHERE (b.id = a.iduser)) AS `rango` FROM `personas` a";
            $resultado=mysqli_query($conexion,$consulta);
            if($resultado){
                while($registro=mysqli_fetch_assoc($resultado)){
                    if($registro["rango"]=="Administrador"){
                        $resultar["nombre"]=$registro["nombre"];
                        $resultar["apellido"]=$registro["apellido"];
                        $resultar["foto"]=$registro["foto"];
                        $resultar["usuario"]=$registro["user"];
                        $json['usuarios'][]=$resultar;
                    }
                }
                echo json_encode($json);
                mysqli_close($conexion);
            }
        }
    }
?>