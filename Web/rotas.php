<?php

use Web\Controller\PessoaController;
use Web\Controller\ProdutoController;
use Web\Controller\CategoriaController;
use Web\Controller\FuncionarioController;
use Web\Controller\LoginController;



$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);




switch($url)
{
    ## ROTAS PARA PESSOA
    case '/pessoa':
        PessoaController::index();
    break;

    case '/pessoa/form':
        PessoaController::form();
    break;

    case '/pessoa/save':
        PessoaController::save();
    break;
    
    case '/pessoa/delete':
        PessoaController::delete();

    ## ROTAS PARA PRODUTO
    case '/produto':
        ProdutoController::index();
    break;

    case '/produto/form':
        ProdutoController::form();
    break;

    case '/produto/save':
        ProdutoController::save();
    break;

    case '/produto/delete':
        ProdutoController::delete();
    break;
    
    ## ROTAS PARA CATEGORIA
    case '/categoria':
        CategoriaController::index();
    break;

    case '/categoria/form':
        CategoriaController::form();
    break;

    case '/categoria/save':
        CategoriaController::save();
    break;

    case '/categoria/delete':
        CategoriaController::delete();
    break;

    ## ROTAS PARA FUNCIONARIO

    case '/funcionario':
        FuncionarioController::index();
    break;

    case '/funcionario/form':
        FuncionarioController::form();
    break;

    case '/funcionario/save':
        FuncionarioController::save();
    break;

    case '/funcionario/delete':
        FuncionarioController::delete();
    break;

    ##ROTAS PARA LOGIN

    case '/login':
        LoginController::form();
    break;

    case '/login/auth':
        LoginController::auth();
    break;

    case '/logout':
        LoginController::logout();
    break;

    case '/signin':
        LoginController::signin();
    break;

    case '/signin/save':
        LoginController::save();
    break;

    case '/login/lista':
        LoginController::lista();
    break;

    case '/login/delete':
        LoginController::delete();
    break;



    
    case '/inicio':
        include 'View/modules/Pg-inicial\Pagina-Inicial.php';
    break;

    default:
    include 'View/modules/Login/LoginForm.php';
    break;
}