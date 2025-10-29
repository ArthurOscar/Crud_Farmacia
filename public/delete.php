<?php

include "../include/db.php";
include "../src/change.php";

$excluir = new Change($conn);

$id = $_GET['id'];
$nome = $_GET['nome'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['escolha'] === 'Sim') {
        if ($excluir->excluirDados($id)) {
            header("location: read.php?msg=sucesso");
            exit();
        } else {
            header("location: read.php?msg=erro");
            exit();
        }
    } else {
        header("location: read.php");
    }
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>

<body>
    <form method="POST">
        <label for="escolha">Tem certeza que deseja deletar o remédio <?= $nome; ?></label><br>
        <input type="submit" name="escolha" value="Sim">
        <input type="submit" name="escolha" value="Não">
    </form>
</body>

</html>