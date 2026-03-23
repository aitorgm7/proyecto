<?php
  require 'configdb.php';
  
  function conectar(){
    $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
    $conexion->set_charset("utf8"); 
    return $conexion;
  }
  
  //Función para mostrar filas de una tabla
  function mostrarResultado(){ 
    //Conecta con la base de datos
    $conexion = conectar();  
    

    //Ejecuta la consulta sql
    $sql="INSERT INTO agradecimientos (mensaje,idEmisor,idReceptor) VALUES ('".$_POST["agradecer"]."',".$_SESSION["id"].",'".$_POST["puesto"]."');";
    $conexion->query($sql);	
    
    echo '<p>enviado a '.$_POST["puesto"].'</p>';
    echo '<p>mensaje: '.$_POST["agradecer"].'</p>';
    $conexion->close();
  }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Aitor Gragera Martín">
        <link rel="stylesheet" href="Estilos.css">
        <title>AGRADECE EN COMPAÑÍA</title>
    </head>
    <body>
        <header class="heagra">
            <h1>AGRADECE EN COMPAÑÍA</h1>
            <hr>
        </header>
        <nav class="menu">
            <a href="" id="lineaN">Agradecer</a>
            <a href="">Recibir</a>
            <a href="inicio_sesion.html">Cerrar Sesión</a>
        </nav>
        <article class="resultado">
            <?php
                mostrarResultado();  
            ?>
            <a href="agradecer.php">volver</a>
        </article>
    </body>
</html>