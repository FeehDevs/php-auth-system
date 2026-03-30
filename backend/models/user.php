<?php 

// __DIR__ é uma constante mágica do PHP que retorna o diretório atual do arquivo
    require_once __DIR__ . "/../database/conexao.php";

    class Usuario {
        private $pdo;

        public function __construct($pdo)
        {
            $this->pdo = $pdo;
        }

        
    }