<?php
  session_start();
  require 'configdb.php';
  
  function conectar(){
    $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
    $conexion->set_charset("utf8"); 
    return $conexion;
  }
  
  //Función para mostrar filas de una tabla
  function mostrarRecibido(){ 
    //Conecta con la base de datos
    $conexion = conectar();  
    

    //Ejecuta la consulta sql
    $sql="SELECT * FROM agradecimientos WHERE idReceptor='".$_SESSION['id']."';";
    $resultado=$conexion->query($sql);

    while($fila=$resultado->fetch_array()){
        $sql2="SELECT nick_jesuita FROM alumnos WHERE puesto='".$fila["idEmisor"]."';";
        $resultado2=$conexion->query($sql2);
        $mostrar=$resultado2->fetch_array();
        echo '<section><p>enviador por: '.$mostrar["nick_jesuita"].'</p><form method=\'post\' action=\'\' disable><input type=\'hidden\' value=\''.$fila["idAgradecimiento"].'\'/><input type=\'submit\' value=\'Ver Mensaje\'/></form></section>';
    }

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
            <a href="agradecer.php">Agradecer</a>
            <a href="recibidos.php" id="lineaN">Recibir</a>
            <a href="cerrarsesion.php">Cerrar Sesión</a>
        </nav>
        <article class="recibir">
            <?php
                mostrarRecibido();  
            ?>
            <a href="agradecer.php">volver</a>
        </article>
        <footer><hr><p><img src=".\logo_jesuita.png" alt="logo_jesuita"></p><hr></footer>
    </body>
</html>