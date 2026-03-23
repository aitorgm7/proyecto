<?php
    session_start();
    include 'conexion.php';
    $sql="SELECT puesto FROM alumno WHERE usuario='".$_POST["usuario"]."' AND contrasena='".$_POST["contrasena"]."';";
    
    $resultado = $conexion->query($sql);

    if($resultado->num_rows > 0){
        $fila = $resultado->fetch_array();
        $_SESSION['id'] = $fila['puesto'];
        
        
        header('location: agradecer.php');
        exit();
    }
    else{
        header('location: inicio_sesion.html');
        exit();
    }
?>