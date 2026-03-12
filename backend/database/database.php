<?php 

$host = getenv('POSTGRES_HOST');
$dbname = getenv('POSTGRES_DB');
$user = getenv('POSTGRES_USER');
$password = getenv('POSTGRES_PASSWORD');


    try {
       $pdo = new PDO(
    "pgsql:host=$host;dbname=$dbname",
    $user,
    $password
    ); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        echo "Conectado com sucesso!!!";
    } catch (PDOException $e) {
        echo "Erro na conexão: " . $e->getMessage();
    }
?>