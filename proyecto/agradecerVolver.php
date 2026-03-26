<?php
  session_start();
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
    $sql="INSERT INTO agradecimientos (mensaje,idEmisor,idReceptor) VALUES ('".$_POST["mensaje"]."','".$_SESSION["id"]."','".$_POST["puesto"]."');";
    $conexion->query($sql);	
    
    echo '<p>enviado a '.$_POST["puesto"].'</p>';
    echo '<p>mensaje: '.$_POST["mensaje"].'</p>';
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
            <a href="agradecer.php" id="lineaN">Agradecer</a>
            <a href="recibidos.php">Recibir</a>
            <a href="cerrarsesion.php">Cerrar Sesión</a>
        </nav>
        <article class="resultado">
            <?php
                mostrarResultado();  
            ?>
            <a href="agradecer.php">volver</a>
        </article>
    </body>
</html>