<?php
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    $json=array();
    if(isset($_POST["nombre"]) && isset($_POST["precio"]) && isset($_POST["cantidad"]) && isset($_POST["foto"]) && isset($_POST["id"])){
        $idcodigo=$_POST["id"];
        $precio=$_POST["precio"];
        $nombre=$_POST["nombre"];
        $cantidad=$_POST["cantidad"];
        $foto=$_POST["foto"];
        $estado_inventario;
        $conexion=mysqli_connect($hostname,$username,$password,$database);
        $consulta="SELECT * FROM `productos` WHERE (`id`='$idcodigo')";
        $resultado=mysqli_query($conexion,$consulta);
        if($resultado){
            if($registro=mysqli_fetch_array($resultado)){
                $estado_inventario=$registro["estado"];
                if($estado_inventario=="Agotado"){
                    $insertar="UPDATE `productos` SET `nombre`='$nombre',`precio`='$precio',`cantidad`='$cantidad',`foto`='$foto',`estado`='Disponible' WHERE (`id`='$idcodigo')";
                    $resultado=mysqli_query($conexion,$insertar);
                }
                else{
                    $insertar="UPDATE `productos` SET `nombre`='$nombre',`precio`='$precio',`cantidad`='$cantidad',`foto`='$foto' WHERE (`id`='$idcodigo')";
                    $resultado=mysqli_query($conexion,$insertar);
                }
                $resultar["validar"]="Actualizado";
                $json['registro'][]=$resultar;
                echo json_encode($json);
                mysqli_close($conexion);
            }
        }
    }
?>