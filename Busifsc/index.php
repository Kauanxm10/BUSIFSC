<?php
session_start();
require_once ('./app/models/Usuario.php');
$usuarios = new Usuario();
$listaUsuarios = $usuarios->selecionarTodos();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listagem de Usuários</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="app/assets/css/style-index.css" />
    <link rel="shortcut icon" type="imagex/png" class="justified" href="app/assets/img/logo.png">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <h1 class="lead">BUSIFSC</h1>
                    <a class="btn btn-primary" href="cadastro.php">Cadastrar-se</a>
                </a>
            </div>
        </nav>
    </header>

    <main>
        <div class="h5 text-center mb-4 title">
            <h2>Listagem de usuários</h2>
        </div>
        <hr class="hr-divider">

        <?php if ($listaUsuarios): ?>
            <div style="background-color: white;" class="container mt-5">
                <div class="row">
                    <div class="col">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Ver mais</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listaUsuarios as $usuario): ?>
                                    <tr>
                                        <th scope="row"><?= $usuario->getId() ?></th>
                                        <td><?= $usuario->getNome() ?></td>
                                        <td><?= $usuario->getEmail() ?></td>
                                        <td><a href="mostrar-usuario.php?id=<?= $usuario->getId() ?>" class="btn btn-primary">Ver
                                                mais detalhes</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <h6 style="text-align: center;">Nenhum usuário disponível</h6>
        <?php endif; ?>

        <hr class="hr">
    </main>
</body>

</html>