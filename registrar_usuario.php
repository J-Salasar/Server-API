<?php
    $hostname="localhost";
    $database="usuario";
    $username="root";
    $password="";
    $idcodigo;
    $json=array();
    $json1=array();
    if(isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["telefono"]) && isset($_POST["correo"]) && isset($_POST["clave"]) && isset($_POST["usuario"]) && isset($_POST["foto"])){
        $codigo=NULL;
        $user=$_POST["usuario"];
        $pass=$_POST["clave"];
        $correo=$_POST["correo"];
        $estado="Desactivado";
        $nombre=$_POST["nombre"];
        $telefono=$_POST["telefono"];
        $apellido=$_POST["apellido"];
        $rango="Usuario";
        $foto=$_POST["foto"];
        $conexion=mysqli_connect($hostname,$username,$password,$database);
        $insertar="INSERT INTO `cuentas`(`id`, `user`, `password`, `correo`, `estado`, `rango`) VALUES ('$codigo','$user','$pass','$correo','$estado','$rango')";
        $resultado=mysqli_query($conexion,$insertar);
        if($resultado){
            $consulta="SELECT * FROM `cuentas` WHERE (`user` = '$user')";
            $resultado=mysqli_query($conexion,$consulta);
            if($registro1=mysqli_fetch_array($resultado)){
                $idcodigo=$registro1["id"];
            }
        }
        $insertar="INSERT INTO `personas`(`id`, `nombre`, `apellido`, `telefono`, `foto`, `iduser`, `dinero`) VALUES ('$codigo','$nombre','$apellido','$telefono','$foto','$idcodigo','1000')";
        $resultado=mysqli_query($conexion,$insertar);
        if($resultado){
            $resultar["validar"]="Registrado";
            $json['registro'][]=$resultar;
            echo json_encode($json);
            mysqli_close($conexion);
        }
    }
?>