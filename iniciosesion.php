<?php
    session_start();
     require 'configdb.php';
  
    function conectar(){
        $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
        $conexion->set_charset("utf8"); 
        return $conexion;
    }

    $conexion=conectar();
    $sql="SELECT puesto FROM alumnos WHERE usuario='".$_POST["usuario"]."' AND contrasena='".$_POST["contrasena"]."';";
    
    $resultado = $conexion->query($sql);

    if($resultado->num_rows > 0){
        $fila = $resultado->fetch_array();
        $_SESSION['id'] = $fila['puesto'];
        
        $conexion->close();
        header('location: agradecer.php');
        exit();
    }
    else{
        $conexion->close();
        header('location: inicio_sesion.html');  //es una cabecera que manda al navegador
        exit();   //sirve para cerrar la pagina por si el header falla
    }
?>