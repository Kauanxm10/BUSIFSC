<?php
require_once ('../models/Usuario.php');
$opcao = $_REQUEST['op'];
$usuarios = new Usuario(); // Initialize Usuario object

switch ($opcao) {
    case 'cadastrar':
        cadastrar();
        break;

    case 'editar':
        editar();
        break;

    case 'atualizar':
        atualizar();
        break;

    case 'excluir':
        excluir();
        break;
}
function cadastrar()
{
    if (empty($_POST['email']) || empty($_POST['senha'])) {
        header('Location: ../../cadastro.php?erro=1');
        return false;
    }

    $nome = filter_var($_POST['nome'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'];

    // cria um novo objeto de usuário
    $usuarios = new Usuario();
    $usuarios->setNome($nome);
    $usuarios->setEmail($email);
    $usuarios->setSenha($senha);

    // var_dump($usuario);
    // die;

    // salva o usuário
    if ($usuarios->salvar()) {
        header('Location: ../../index.php?sucesso=2');
        return true;
    }
    else 
    {
        header('Location: ../../index.php?erro=0');
        return false;
    }

}

function editar()
{
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT); //ajuda a diminuir ataques de injecao de SQL
    $usuarios = new Usuario();
    $usuario = $usuarios->selecionarPorIdUsuario($id);

    //agora precisamos chamar o formulario de edicao
    require_once ('../../usuario-editar.php');
}

function atualizar()
{
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_var($_POST['nome'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $senha = $_POST['nova_senha'];

    $usuarios = new Usuario();
    $usuario = $usuarios->selecionarPorIdUsuario($id);


    $usuario->setId($id);
    $usuario->setNome($nome);
    $usuario->setEmail($email);


    if (!empty($_POST['nova_senha'])) {
        $senha = $_POST['nova_senha'];
        $usuario->setSenha($senha);
    } else {
        $senha = $usuario->getSenha($id);
    }

    if ($usuario->atualizar($id)) {
        header('Location: ../../index.php');
        return false;
    }
    header('Location: ../../usuario-editar.php?erro=3');
    return true;

}
function excluir()
{
    if (empty($_GET['id'])) {
        header('Location: ../index.php?erro=1');
        return false; //ou exit
    }

    //se continuar aqui, deu boa com ID
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $usuarios = new Usuario();
    if ($usuarios->excluir($id)) {
        header('Location: ../../index.php?sucesso=1');
        return true; //ou exit
    } else {
        header('Location: ../../index.php?erro=0');
        return false; //ou exit
    }

}
?>