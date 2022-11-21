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

        return $stmt->fetchObject("Web\Model\LoginModel"); 
    }

    function insert(LoginModel $model) 
    {
           
        $sql = "INSERT INTO login 
                (nome, usuario, senha) 
                VALUES (?, ?, sha1(?))";
        

        $stmt = $this->conexao->prepare($sql);

        
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->usuario);
        $stmt->bindValue(3, $model->senha);

        
        $stmt->execute();      
    }

    public function update(LoginModel $model)
    {
        $sql = "UPDATE login SET nome=?, usuario=?, senha=sha1(?) WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->usuario);
        $stmt->bindValue(3, $model->senha);
        $stmt->bindValue(4, $model->id);
        $stmt->execute();
    }

    public function selectById(int $id)
    {

        $sql = "SELECT * FROM login WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("Web\Model\LoginModel"); 
    }

    public function select()
    {
        $sql = "SELECT * FROM login";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM login WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        
        $stmt->execute();
    }

    
}