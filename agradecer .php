<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Aitor Gragera Martín">
    <meta http-equiv="refresh" content="3">
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
    <article>
        <form action="" method="post">
            <label for="nombre">para</label><br>
            <select name="nombre" id="nombre">
                <php?
                    '<option value='$idAlumno'>'$nombre'</option>' /*dentro del value va el $idAlumno que es el que identifica el nombre*/
                ?>
            </select><br>
            <label for="agradecer">quiero agradecer</label><br>
            <textarea name="agradecer" id="agradecer" placeholder="Escribe aquí tu mensaje de agradecimiento..."></textarea><br>
            <input type="submit" value="ENVIAR">
        </form>
    </article>
    <div><hr><img src=".\logo_jesuita.png" alt="logo_jesuita"><hr></div>
</body>
</html>