<?php

namespace Web\DAO;

use Web\Model\LoginModel;
use \PDO;

class LoginDAO extends DAO
{
    public function __construct()
    {
        
        parent::__construct();       
    }
   
    public function selectByEmailAndSenha($usuario, $senha)
    {
        $sql = "SELECT * FROM login WHERE usuario = ? AND senha = sha1(?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $usuario);
        $stmt->bindValue(2, $senha);
        $stmt->execute();

        return $stmt->fetchObject("Web\Model\LoginModel"); // Retornando um objeto específico PessoaModel
    }
    
}