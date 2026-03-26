<?php
  require 'configdb.php';
  
  function conectar(){
    $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
    $conexion->set_charset("utf8"); 
    return $conexion;
  }
  
  //Función para mostrar filas de una tabla
  function mostrar_alumnos(){ 
    //Conecta con la base de datos
    $conexion = conectar();  
    
    //Ejecuta la consulta sql
    $sql = "select * from alumnos";
    $resultado = $conexion->query($sql);	
    
    while($fila = $resultado->fetch_array()){
        echo "<option value='" . $fila["puesto"] . "'>" . $fila["nombre"] . "</option>";
    }
    
  }
?>