<?php
// Exibir erros no navegador (ajuda muito no teste)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Importa a conexão e o Model
require_once __DIR__ . "/database/database.php";
require_once "./models/Usuario.php";

try {
    // 1. Instancia a classe passando a conexão $pdo que está no seu database.php
    $userModel = new Usuario($pdo);

    // 2. TESTE DE CADASTRO
    echo "<h3>Testando Cadastro:</h3>";
    $emailTeste = "robson" . rand(1, 999) . "@teste.com"; // Email aleatório para não repetir
    $resultado = $userModel->cadastrar($emailTeste, "123456");
    
    if ($resultado) {
        echo "✅ Usuário $emailTeste cadastrado com sucesso!<br>";
    }

    // 3. TESTE DE EXIBIÇÃO
    echo "<h3>Testando Listagem:</h3>";
    $usuarios = $userModel->exibirTodos();

    echo "<pre>";
    print_r($usuarios); // Mostra o array de usuários de forma legível
    echo "</pre>";

} catch (Exception $e) {
    echo "❌ Erro no teste: " . $e->getMessage();
}