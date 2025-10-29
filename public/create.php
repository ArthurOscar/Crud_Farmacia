<?php

include "../include/db.php";
include "../src/insert.php";

$criar = new Criar($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['inserirRemedio'])) {
        if ($_POST['nome'] == "" || $_POST['bula'] == "" || $_POST['tipo'] == "" || $_POST['codigo_remedio'] == "" || $_POST['estoque'] == "" || $_POST['preco'] == "") {
            echo "<script>alert('Preencha todos os campos de remédio')</script>";
        } else {
            $nome = $_POST['nome'];
            $bula = $_POST['bula'];
            $tipo = $_POST['tipo'];
            $codigo_remedio = $_POST['codigo_remedio'];
            $estoque = $_POST['estoque'];
            $preco = $_POST['preco'];

            if ($criar->inserirRemedio($nome, $bula, $tipo, $codigo_remedio, $estoque, $preco)) {
                echo "<script>alert('Remédio inserido com sucesso!')</script>";
                header("refresh:0;");
            } else {
                echo "<script>alert('Ocorreu um erro, verifique todos os campos.')</script>";
                header("refresh:0;");
            }
        }
    }
    if (isset($_POST['inserirUsuario'])) {
        if ($_POST['nome'] == "" || $_POST['email'] == "" || $_POST['senha'] == "" || $_POST['cpf'] == "" || $_POST['funcao'] == "") {
            echo "<script>alert('Preencha todos os campos de usuário')</script>";
        } else {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $cpf = $_POST['cpf'];
            $funcao = $_POST['funcao'];

            if ($criar->inserirUsuario($nome, $email, $senha, $cpf, $funcao)) {
                echo "<script>alert('Usuário inserido com sucesso!')</script>";
                header("refresh:0;");
            } else {
                echo "<script>alert('Ocorreu um erro, verifique todos os campos.')</script>";
                header("refresh:0;");
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
    <h1>Inserir Remédio:</h1>
    <form method="POST" action="create.php" class="forms">
        <input type="text" name="nome" placeholder="Nome" maxlength="100" required><br>
        <input type="text" name="bula" placeholder="Bula" maxlength="300" required><br>
        <input type="text" name="tipo" placeholder="Tipo do Remédio (Oral, Injetavel, etc)" maxlength="60" required><br>
        <select name="codigo_remedio">
            <option value="" selected>Código Remédio</option>
            <option value="A">Código A</option>
            <option value="B">Código B</option>
            <option value="C">Código C</option>
        </select><br>
        <input type="number" name="estoque" placeholder="Estoque" required><br>
        <input type="float" name="preco" placeholder="Preço Unitário (12.34)" required><br>
        <button type="submit" name="inserirRemedio">Enviar</button>
    </form>
    <h1>Inserir Usuário:</h1>
    <form method="POST" action="create.php" class="forms">
        <input type="text" name="nome" placeholder="Nome" maxlength="100" required><br>
        <input type="email" name="email" placeholder="Email" maxlength="255" required><br>
        <input type="password" name="senha" placeholder="Senha" maxlength="255" required><br>
        <input type="text" name="cpf" placeholder="CPF" maxlength="11" required><br>
        <select name="funcao">
            <option value="" selected>Função</option>
            <option value="admin">Administrador</option>
            <option value="funcionario">Funcionário</option>
        </select><br>
        <button type="submit" name="inserirUsuario">Enviar</button>
    </form>
    <a href="read.php">Listar Resultados</a>
</body>

</html>