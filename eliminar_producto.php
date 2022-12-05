<?php
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    if(isset($_POST["id"])){
        $id=$_POST["id"];
        $idproducto;
        $user;
        $cantidad_carrito;
        $cantidad_inventario;
        $respuesta;
        $estado;
        $conexion=mysqli_connect($hostname,$username,$password,$database);
        $consulta="SELECT * FROM `carrito` WHERE (`id`='$id')";
        $resultado=mysqli_query($conexion,$consulta);
        if($resultado){
            if($registro=mysqli_fetch_array($resultado)){
                $idproducto=$registro["idproducto"];
                $user=$registro["usuario"];
                $cantidad_carrito=$registro["cantidad"];
                $consulta="SELECT * FROM `productos` WHERE (`id`='$idproducto')";
                $resultado=mysqli_query($conexion,$consulta);
                if($resultado){
                    if($registro=mysqli_fetch_array($resultado)){
                        $cantidad_inventario=$registro["cantidad"];
                        $estado=$registro["estado"];
                        $respuesta=$cantidad_inventario+$cantidad_carrito;
                        if($estado=="Disponible"){
                            $insertar="UPDATE `productos` SET `cantidad`='$respuesta' WHERE (`id`='$idproducto')";
                            $resultado=mysqli_query($conexion,$insertar);
                        }
                        else{
                            if($estado=="Agotado"){
                                $insertar="UPDATE `productos` SET `cantidad`='$respuesta', `estado`='Disponible' WHERE (`id`='$idproducto')";
                            $resultado=mysqli_query($conexion,$insertar);
                            }
                        }
                        $borrar="DELETE FROM `carrito` WHERE (`id`='$id')";
                        $resultado=mysqli_query($conexion,$borrar);
                        $resultar["consulta"]="aprobado";
                        $json['datos'][]=$resultar;
                        echo json_encode($json);
                        mysqli_close($conexion);
                    } 
                }
            }
        }
        
    }
?>