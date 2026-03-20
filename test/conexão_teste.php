<?php

// Colocando apenas ./ e o nome para mostrar que estão no memso diretorio
require_once "./database.php";

$stmt = $pdo->query("SELECT * FROM users");

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

print_r($users);

?>