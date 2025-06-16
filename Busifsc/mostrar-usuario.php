<?php
session_start();
require_once ('./app/models/Usuario.php');
$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
$usuarios = new Usuario();
$usuario = $usuarios->selecionarPorIdUsuario($id);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="app/assets/css/style-cadastro.css" />
    <link rel="shortcut icon" type="imagex/png" class="justified" href="app/assets/img/logo.png">
</head>

<header>
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="./index.php">
                <h1 class="lead">BUSIFSC</h1>
            </a>
       
        </div>
    </nav>
</header>

<main style="margin-top: 40px;" id="main" class="container">


    <h2>Dados</h2>
    <hr style="background-color: white;" class="hr">

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
        <div class="card col-md-7">
            <div class="card-body">
                <div class="text-center">
                    <div class="mt-3">
                        <p class="mb-1 h4">
                            <?= $usuario->getNome() ?>
                        </p>
                        <p class="mb-0">
                            <?= $usuario->getEmail() ?>
                        </p>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <a class="btn btn-info"
                        href="./app/controllers/usuarios.php?op=editar&id=<?php echo $usuario->getId(); ?>">Editar</a>
                    <a style="margin-left: 2%; margin-right: 2%;" class="btn btn-danger" href="javascript:void(0);"
                        onclick="confirmarExclusao();">Excluir</a>
                    <a class="btn btn-primary" href="index.php">Voltar</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmarExclusao() {
            var resposta = confirm("Tem certeza que deseja excluir sua conta? Esta ação é irreversível.");
            if (resposta) {
                window.location.href = "./app/controllers/usuarios.php?op=excluir&id=<?php echo $usuario->getId(); ?>";
            } else {
                // Se o usuário cancelar, não faça nada
            }
        }
    </script>

</main>