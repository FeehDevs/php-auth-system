<?php 
require_once '/backend/database/database.php';

try {
    $stmt = $pdo->query("SELECT * FROM users");
    
    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
        echo "Erro na conexão: " . $e->getMessage();
    }
?>