<?php

include "../include/db.php";
include "../src/list.php";

$mostrar = new Mostrar($conn);
if (isset($_GET['msg']) && $_GET['msg'] === 'sucesso') {
    echo "<script>alert('Sucesso ao remover o item!');</script>";
} else if (isset($_GET['msg']) && $_GET['msg'] === 'erro'){
    echo "<script>alert('Erro ao remover o item!');</script>";
}
echo "<div id='container'>";

// Remédios
echo "<h1>Remédios</h1>";
echo "<form method='GET'>
    <input type='text' name='filtro' placeholder='Filtro'>
    <button type='submit'>Filtrar</button>
    <a href='read.php'><button type='button'>Limpar</button></a>
    </form>";

$filtro = isset($_GET['filtro']) ? $_GET['filtro'] : "";

$row = $mostrar->mostrarRemedios($filtro);

if (is_array($row) && count($row) > 0) {
    echo "<table class='table table-striped' border='1'>
        <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Bula</th>
        <th>Tipo</th>
        <th>Código Remédio</th>
        <th>Estoque</th>
        <th>Preço</th>
        </tr>";

    foreach ($row as $item) {
        $id = htmlspecialchars($item['id']);
        $nome = htmlspecialchars($item['nome']);
        $bula = htmlspecialchars($item['bula']);
        $tipo = htmlspecialchars($item['tipo']);
        $codigo = htmlspecialchars($item['codigo_remedio']);
        $estoque = htmlspecialchars($item['estoque']);
        $preco = htmlspecialchars($item['preco']);

        echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$nome}</td>";
        echo "<td>{$bula}</td>";
        echo "<td>{$tipo}</td>";
        echo "<td>{$codigo}</td>";
        echo "<td>{$estoque}</td>";
        echo "<td>{$preco}</td>";
        $query = "id={$id}&&nome={$nome}&&bula={$bula}&&tipo={$tipo}&&estoque={$estoque}&&preco={$preco}";
        echo "<td>
            <a href='delete.php?id={$id}&nome={$nome}'>Excluir</a> |
            <a href='update.php?{$query}'>Editar</a>
            </td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Não foi possível encontrar nenhum remédio.<br>";
}
echo "</div>"
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <a href="create.php">Adicionar Registros</a>
</body>

</html>