<?php

namespace Web\Controller;

use Web\DAO\LoginDAO;
use Web\Model\LoginModel;


class LoginController extends Controller
{
    public static function form()
    {
        $model = new LoginModel();

        if(isset($_GET['id'])) 
            $model = $model->getById( (int) $_GET['id']); 
            

        include 'View/modules/Login/LoginForm.php';
    }

    public static function signin()
    {
        include 'View/modules/Login/LoginSignIn.php';
    }

    public static function lista()
    {
        include 'View/modules/Login/LoginLista.php';
    }

    public static function auth()
    {
        $model = new LoginModel();

        $model->email = $_POST['usuario'];
        $model->senha = $_POST['senha'];

        $usuario_logado = $model->autenticar();

        if ($usuario_logado !== null) {

            $_SESSION['usuario_logado'] = $usuario_logado;

            header("Location: /inicio");

        } else
            header("Location: /login?erro=true");
    }

    public static function logout()
    {
        unset($_SESSION['usuario_logado']);

        parent::isAuthenticated();
    }

    public static function save() 
    {
        $login = new LoginModel();

        $login->id = $_POST['id'];
        $login->nome = $_POST['nome'];
        $login->usuario = $_POST['usuario'];
        $login->senha = $_POST['senha'];
        
        
        $login->save();

        header("Location: /login"); 
    }

    public static function delete()
    {


        $model = new LoginDAO();

        $model->delete( (int) $_GET['id'] ); // Enviando a variável $_GET como inteiro para o método delete

        header("Location: /login");
    }


}