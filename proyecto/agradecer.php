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
        echo '<option value="' . $fila["puesto"] . '">' . $fila["nombre"] . '</option>';
    }
    
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
        <article>
            <form id="agradece" action="agradecerVolver.php" method="post">
                <label for="puesto">para</label><br>
                <select name="puesto" id="puesto">
                    <?php
                        mostrar_alumnos();
                    ?>
                </select><br>
                <label for="mensaje">quiero agradecer</label><br>
                <textarea name="mensaje" id="mensaje" placeholder="Escribe aquí tu mensaje de agradecimiento..."></textarea><br>
                <input type="submit" value="ENVIAR">
            </form>
        </article>
        <footer><hr><p><img src=".\logo_jesuita.png" alt="logo_jesuita"></p><hr></footer>
    </body>
</html>