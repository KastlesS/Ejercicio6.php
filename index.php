<?php
$mensaje="";

/* Creamos una funcion que devuleva un array el cual es la tabla del juego */
function crearArray($filas,$columnas):array{
    $tabla=[];
    for($i=0;$i<$filas;$i++){
        for($k=0;$k<$columnas;$k++){
            /* Llenamos el array de 0 para después que el tesoro valga en el array 1 */
            $tabla[$i][$k]=0;
        }
    }
    return $tabla;
}

/* Creamos una función que genere una tabla para el html según el array seleccionado */
function crearTabla($array):string{
    $texto="<table>";
        foreach($array as $fila){
            $texto.="<tr>";
            foreach($fila as $celda){
                $texto.="<td>{$celda}</td>";
            }
            $texto.="</tr>";
        }
    $texto.="</table>";
    return $texto;
}

$tabla="";

/* Creamos una función que genere dos números random (la fila y la columna de donde va a estar el tesoro) */
function ponerTesoro(&$array){
    $fila=rand(0,(count($array)-1));
    $columna=rand(0,(count($array[0])-1));

    /* Añadimos el valor 1 al array (donde está el tesoro) */
    $array[$fila][$columna]=1;
}

if(isset($_GET["difficulty"])){
    /* Recogemos la dificultad: */
    $mensaje="Has escogido la dificultad: ".$_GET["difficulty"];
    $dificultad=$_GET["difficulty"];
    /* Creamos un array que va a ser la tabla del juego */
    $array=[];
    /* Creamos una variable con los intentos que tiene el usuario */
    $intentos=0;
    /* Ahora tenemos que crear sus filas y columnas dependiendo de la difucultad seleccionada */
    if($dificultad=="Facil"){
        $array=crearArray(5,5);
        ponerTesoro($array);
        $intentos=10;
        $tabla=crearTabla($array);
    }else if($dificultad=="Normal"){
        $array=crearArray(10,5);
        ponerTesoro($array);
        $intentos=10;
        $tabla=crearTabla($array);
    }else if($dificultad=="Dificil"){
        $array=crearArray(10,10);
        ponerTesoro($array);
        $intentos=5;
        $tabla=crearTabla($array);
    }    
}
?>

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
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <button type="submit" class="boton" name="difficulty" value="Facil" title="Tabla 5x5 con 10 intentos">Facil</button>
            <button type="submit" class="boton" name="difficulty" value="Normal" title="Tabla 10x5 con 10 intentos">Normal</button>
            <button type="submit" class="boton" name="difficulty" value="Dificil" title="Tabla 10x10 con 5 intentos">Dificil</button>
        </form>
    </section>

    <!-- Contenedores donde va a estar la tabla y los elementos como las vidas e intentos -->
    <main class="principal">
        <div class="contenedor">
            <?=$tabla?>
        </div>
    </main>
</body>
</html>