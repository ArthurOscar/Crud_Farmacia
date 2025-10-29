<?php

class Change
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function excluirDados($id)
    {
        $sql = "DELETE FROM remedios WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    public function editarDados($id, $nome, $bula, $tipo, $codigo_remedio, $estoque, $preco)
    {
        if ($estoque < 0) {
            echo "<script>alert('O estoque não pode ser negativo!'); window.location.href='read.php';</script>";
            exit();
        }

        if ($preco < 0 || !preg_match('/^\d{1,10}(\.\d{1,2})?$/', $preco)) {
            echo "<script>alert('Por favor, insira um preço válido!'); window.location.href='read.php';</script>";
            exit();
        }

        $sql = "UPDATE remedios SET nome = :nome, bula = :bula, tipo = :tipo, codigo_remedio = :codigo_remedio, estoque = :estoque, preco = :preco WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":bula", $bula);
        $stmt->bindParam(":tipo", $tipo);
        $stmt->bindParam(":codigo_remedio", $codigo_remedio);
        $stmt->bindParam(":estoque", $estoque);
        $stmt->bindParam(":preco", $preco);
        return $stmt->execute();
    }
}
