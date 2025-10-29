<?php

class Change{
    private $conn;

    public function __construct($db){
        $this-> conn = $db;
    }

    public function excluirDados($id){
        $sql = "DELETE FROM remedios WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt -> bindParam(":id", $id);
        return $stmt -> execute();
    }
}


?>