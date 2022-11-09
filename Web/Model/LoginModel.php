<?php

namespace Web\Model;

use \Web\DAO\LoginDAO;


class LoginModel extends Model
{
    public $id, $nome, $usuario, $senha;


    public function autenticar()
    {
        $dao = new LoginDAO();
        
        $dados_usuario_logado = $dao->selectByEmailAndSenha($this->email, $this->senha);

        if(is_object($dados_usuario_logado))
            return $dados_usuario_logado;
        else
            null;
    }

    public function save()
    {

        $dao = new LoginDAO();

        // Se id for nulo, significa que trata-se de um novo registro
        // caso contrário, é um update poque a chave primária já existe.
        if(empty($this->id)) 
        {
            // No que estamos enviado o proprio objeto model para o insert, por isso do this
            $dao->insert($this);
        } else {
            $dao->update($this);
        }
    }

    public function getAllRows()
    {

        $dao = new LoginDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {

        $dao = new LoginDAO();

        $obj = $dao->selectById($id); // Obtendo um model preenchido da camada DAO

        // Para saber mais operador ternário, leia: https://pt.stackoverflow.com/questions/56812/uso-de-e-em-php
        return ($obj) ? $obj : new LoginModel(); // Operador Ternário

    }

    public function delete(int $id)
    {

        $dao = new LoginDAO();

        $dao->delete($id);
    }
}