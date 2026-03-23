<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>datos:</h1>

    <?php
        require 'funciones_alumnos.php';
        actualizar();
       /* $total_filas=mostrar_alumnos();
        if($total_filas='0')
            "no hay datos";
        else
            echo $total_filas["puesto"];
            echo $total_filas["nombre"];
        */
    ?>
</body>
</html>