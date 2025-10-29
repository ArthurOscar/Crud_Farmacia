<?php

include "../include/db.php";
include "../src/change.php";

$editar = new Change($conn);

$id = $_GET['id'];
$nome_old = $_GET['nome'];
$bula_old = $_GET['bula'];
$tipo_old = $_GET['tipo'];
$estoque_old = $_GET['estoque'];
$preco_old = $_GET['preco'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['editarRemedio'])) {
        if ($_POST['nome'] == "" || $_POST['bula'] == "" || $_POST['tipo'] == "" || $_POST['codigo_remedio'] == "" || $_POST['estoque'] == "" || $_POST['preco'] == "") {
            echo "<script>alert('Preencha todos os campos de remédio')</script>";
        } else {
            $nome = $_POST['nome'];
            $bula = $_POST['bula'];
            $tipo = $_POST['tipo'];
            $codigo_remedio = $_POST['codigo_remedio'];
            $estoque = $_POST['estoque'];
            $preco = $_POST['preco'];

            if ($editar->editarDados($id, $nome, $bula, $tipo, $codigo_remedio, $estoque, $preco)) {
                echo "<script>alert('Remédio editado com sucesso!'); window.location.href='read.php';</script>";
                header("refresh:0;");
            } else {
                echo "<script>alert('Ocorreu um erro, verifique todos os campos.')</script>";
            }
        }
    }
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>

<body>
    <h1>Editar Remédio:</h1>
    <form method="POST" class="forms">
        <input type="text" name="nome" value="<?= $nome_old; ?>" maxlength="100" required><br>
        <input type="text" name="bula" value="<?= $bula_old; ?>" maxlength="300" required><br>
        <input type="text" name="tipo" value="<?= $tipo_old; ?>" maxlength="60" required><br>
        <select name="codigo_remedio">
            <option value="" selected>Código Remédio</option>
            <option value="A">Código A</option>
            <option value="B">Código B</option>
            <option value="C">Código C</option>
        </select><br>
        <input type="number" name="estoque" value="<?= $estoque_old; ?>" required><br>
        <input type="float" name="preco" value="<?= $preco_old; ?>" required><br>
        <button type="submit" name="editarRemedio">Enviar</button>
    </form>
    <a href="read.php">Voltar</a>
</body>

</html>