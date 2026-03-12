<?php 
    $host = getenv("POSTGRES_HOST") ?: 'login_db';
    $port = getenv("POSTGRES_PORT") ?: 5432;
    $dbname = getenv("POSTGRES_DB") ?: 'login_db';  
    $user = getenv("POSTGRES_USER") ?: 'admin'; 
    $password = getenv("POSTGRES_PASSWORD") ?: 'admin';

    try {
        $pdo = new PDO (
          "pgsql:host=$host;port=$port;dbname=$dbname", $user, $password  
        );
        
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        echo "Conectado com sucesso!!!";
    } catch (PDOException $e) {
        echo "Erro na conexão: " . $e->getMessage();
    }
?>