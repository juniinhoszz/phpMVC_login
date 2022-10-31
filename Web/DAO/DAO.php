<?php

namespace Web\DAO;
use \PDO;
use \PDOException;

abstract class DAO extends PDO {

    protected $conexao;

    public function __construct()
    {
        // DSN (Data Source Name) onde o servidor MySQL será encontrado
        // (host) em qual porta o MySQL está operado e qual o nome do banco pretendido
        // Mais informações sobre DSN: https://www.php.net/manual/pt_BR/ref.pdo-mysql.connection.php
        $dsn = "mysql:host=localhost:3307" . ";dbname=db_sistema";

        // Criando a conexão e armazenado na propriedade definida para tal.
        // Veja o que é PDO: https://www.php.net/manual/pt_BR/intro.pdo.php
         $this->conexao = new PDO($dsn, "root", "etecjau");
    }
}