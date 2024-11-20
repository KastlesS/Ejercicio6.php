<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busqueda del Tesoro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header -->
    <header class="cabecera">
        <h1>Busqueda del Tesoro</h1>
        <h3>Ivan Castillo y Nicolas Anton</h3>
    </header>

    <!-- Seleccion de dificultad -->
    <section class="banner">
        <h2>Selecciona la dificultad: </h2>
        <form action="<?$_SERVER['PHP_SELF']?>" method="get">
            <button type="submit" class="boton" value="easy" title="Tabla 5x5 con 10 intentos">Facil</button>
            <button type="submit" class="boton" value="normal" title="Tabla 5x10 con 10 intentos">Normal</button>
            <button type="submit" class="boton" value="hard" title="Tabla 10x10 con 5 intentos">Dificil</button>
        </form>
    </section>

    <!-- Contenedores donde va a estar la tabla y los elementos como las vidas e intentos -->
    <main class="principal">

    </main>
</body>
</html>