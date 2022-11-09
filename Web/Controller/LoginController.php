<?php

namespace Web\Controller;
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
        $login->rg = $_POST['senha'];
        
        
        $login->save();

        header("Location: /login"); 
    }


}