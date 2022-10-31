<?php

namespace Web\Controller;
use Web\Model\LoginModel;


class LoginController extends Controller
{
    public static function index()
    {
        include 'View/modules/Login/LoginForm.php';
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
}