<?php

include "../include/db.php";
include "../src/mostrar.php";

$mostrar = new Mostrar($conn);

echo "<h1>Remédios</h1>";
echo "<form method='GET'><input type='text' name='filtro' placeholder='Filtro'>
    <button type='submit'>Filtrar</button></form>";

$filtro = $_GET['filtro'];

if ($mostrar->mostrarRemedios($filtro) > 0) {
    echo "<table class='table table-striped' Border='1'>
        <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Bula</th>
        <th>Código Remédio</th>
        </tr>";
    echo "</table>";
} else {
    echo "Não foi possivel encontra nenhum remédio.<br>";
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
</head>

<body>
</body>

</html>