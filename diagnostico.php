<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>Diagnóstico paso a paso</h2>";

// Paso 1: Verificar si existe configdb.php
echo "<h3>Paso 1: Verificando configdb.php</h3>";
if(file_exists('configdb.php')){
    echo "✓ configdb.php existe<br>";
    require 'configdb.php';
    
    // Verificar constantes definidas
    if(defined('SERVIDOR')) echo "✓ SERVIDOR definido: " . SERVIDOR . "<br>";
    if(defined('USUARIO')) echo "✓ USUARIO definido: " . USUARIO . "<br>";
    if(defined('PASSWORD')) echo "✓ PASSWORD definido<br>";
    if(defined('BBDD')) echo "✓ BBDD definido: " . BBDD . "<br>";
} else {
    echo "✗ configdb.php NO existe en la carpeta actual<br>";
    echo "Directorio actual: " . __DIR__ . "<br>";
}

// Paso 2: Verificar funciones_alumnos.php
echo "<h3>Paso 2: Verificando funciones_alumnos.php</h3>";
if(file_exists('funciones_alumnos.php')){
    echo "✓ funciones_alumnos.php existe<br>";
    require 'funciones_alumnos.php';
    
    if(function_exists('conectar')){
        echo "✓ Función conectar() existe<br>";
        
        // Paso 3: Probar conexión
        echo "<h3>Paso 3: Probando conexión a BD</h3>";
        $conexion = conectar();
        
        if($conexion){
            echo "✓ Conexión exitosa a la base de datos<br>";
            
            // Paso 4: Probar consulta
            echo "<h3>Paso 4: Probando consulta SQL</h3>";
            $sql = "select * from alumnos";
            $resultado = $conexion->query($sql);
            
            if($resultado){
                echo "✓ Consulta ejecutada correctamente<br>";
                echo "Número de registros encontrados: " . $resultado->num_rows . "<br>";
                
                if($resultado->num_rows > 0){
                    echo "<h3>Paso 5: Datos de la tabla alumnos:</h3>";
                    while($fila = $resultado->fetch_assoc()){
                        echo "Puesto: " . $fila['puesto'] . " - Nombre: " . $fila['nombre'] . "<br>";
                    }
                } else {
                    echo "<h3>⚠ La tabla 'alumnos' está vacía</h3>";
                }
            } else {
                echo "✗ Error en la consulta: " . $conexion->error . "<br>";
            }
        } else {
            echo "✗ Error de conexión a la base de datos<br>";
            echo "Error: " . mysqli_connect_error() . "<br>";
        }
    } else {
        echo "✗ La función conectar() no está definida en funciones_alumnos.php<br>";
    }
} else {
    echo "✗ funciones_alumnos.php NO existe en la carpeta actual<br>";
    echo "Directorio actual: " . __DIR__ . "<br>";
}

// Paso 6: Listar archivos en la carpeta actual
echo "<h3>Paso 6: Archivos en la carpeta actual:</h3>";
$archivos = scandir(__DIR__);
foreach($archivos as $archivo){
    if($archivo != '.' && $archivo != '..'){
        echo "- $archivo<br>";
    }
}
?>