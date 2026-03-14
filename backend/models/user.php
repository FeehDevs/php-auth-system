<?php

// 1. O nome da classe geralmente é no singular e começa com Maiúscula (Padrão PSR)
class Usuario {
    
    // ATRIBUTOS PRIVADOS: Ninguém de fora acessa diretamente.
    // Isso protege os dados do seu banco de dados.
    private $pdo;
    private $email;
    private $senha;

    /**
     * O CONSTRUTOR: É o primeiro método executado quando você dá um "new Usuario()".
     * Aqui nós "injetamos" a conexão do banco que vem do seu database.php.
     */
    public function __construct($conexao) {
        $this->pdo = $conexao;
    }

    /**
     * MÉTODO PARA CADASTRAR: Recebe os dados e salva no banco.
     * Note que usamos "Prepare Statements" para evitar SQL Injection.
     */
    public function cadastrar($email, $senha) {
        // Criptografa a senha antes de salvar (Segurança Profissional)
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (email, senha) VALUES (:email, :senha)";
        $stmt = $this->pdo->prepare($sql);
        
        // Vincula os valores de forma segura
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senhaHash);

        return $stmt->execute();
    }

    /**
     * MÉTODO PARA EXIBIR: Busca todos os usuários.
     * Como é uma consulta simples, usamos o query() ou prepare().
     */
    public function exibirTodos() {
        $sql = "SELECT id, email FROM users"; // Evitamos buscar a senha por segurança
        $stmt = $this->pdo->query($sql);
        
        // Retorna os dados como um array associativo (fácil de ler no PHP)
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}