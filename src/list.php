<?php

class Mostrar{
    private $conn;

    public function __construct($db){
        $this-> conn = $db;
    }

    public function mostrarRemedios($filtro){
        $sql = "SELECT * FROM remedios WHERE nome LIKE :filtro OR id LIKE :filtro OR codigo_remedio LIKE :filtro OR tipo LIKE :filtro";
        $stmt = $this->conn->prepare($sql);
        $filtro = "%$filtro%";
        $stmt->bindParam(":filtro", $filtro);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function mostrarUsuarios(){
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>