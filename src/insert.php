<?php

class Criar
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function inserirRemedio($nome, $bula, $tipo, $codigo_remedio, $estoque, $preco)
    {
        if ($preco < 0 || !preg_match('/^\d{1,10}(\.\d{1,2})?$/', $preco)) {
            echo "<script>alert('Por Favor, insira um valor válido.')</script>";
        } else if ($estoque <= 0) {
            echo "<script>alert('Por Favor, insira a quantidade de estoque válido.')</script>";
        } else {
            $sql = "INSERT INTO remedios (nome, bula, tipo, codigo_remedio, estoque, preco) VALUES (:nome, :bula, :tipo, :codigo_remedio, :estoque, :preco)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":bula", $bula);
            $stmt->bindParam(":tipo", $tipo);
            $stmt->bindParam(":codigo_remedio", $codigo_remedio);
            $stmt->bindParam(":estoque", $estoque);
            $stmt->bindParam(":preco", $preco);
            return $stmt->execute();
        }
    }
    public function inserirUsuario($nome, $email, $senha, $cpf, $funcao)
    {
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (nome, email, senha, CPF, funcao) VALUES (:nome, :email, :senha, :cpf, :funcao)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":senha", $hash);
        $stmt->bindParam(":cpf", $cpf);
        $stmt->bindParam(":funcao", $funcao);
        return $stmt->execute();
    }
}
