<?php

$host = "localhost";
$user = "root";
$pass = "root";
$dbname = "crud_farmacia";

try{
    $conn = new PDO("mysql: host=$host;dbname=$dbname", $user, $pass);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo "Conexão falhou " . $e->getMessage();
}

?>