<?php
$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
$usuarios = new Usuario();
$usuario = $usuarios->selecionarPorIdUsuario($id);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edição de Usuário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href=".././assets/css/style-cadastro.css"/>
    <link rel="shortcut icon" type="imagex/png" class="justified" href="app/assets/img/logo.png">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="container">
            <a class="navbar-brand" href="../../index.php">
                    <h1 class="lead">BUSIFSC</h1>
                </a>
                <a class="btn btn-primary" href="../../mostrar-usuario.php?id=<?php echo $usuario->getId(); ?>">Voltar</a>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="row">
            <div class="container vh-100 d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="h5 text-center mb-4 title">
                                <h2>Alterar os dados</h2>
                            </div>

                                <form name="form-contato" method="post" action="./usuarios.php">
                                    <p class="lead center">Insira os novos dados do usuário.</p>

                                    <div class="mb-4">
                                        <label for="form-nome" class="form-label inputs">Novo nome:</label>
                                        <input class="form-control placeholder border-white no-outline pblack"
                                            type="text" name="nome" id="form-nome" size="20" placeholder="Nome Completo"
                                            value="<?php echo $usuario->getNome(); ?>">
                                    </div>

                                    <div class="mb-4">
                                        <label for="form-email" class="form-label inputs">Novo e-mail: </label>
                                        <input class="form-control placeholder border-white no-outline pblack"
                                            type="email" name="email" id="form-email" placeholder="email@dominio.com"
                                            value="<?php echo $usuario->getEmail(); ?>">
                                    </div>

                                    <div class="mb-4">
                                        <label for="form-senha">Nova senha: </label>
                                        <input class="form-control placeholder border-white no-outline pblack"
                                            type="password" name="nova_senha"
                                            placeholder="Use caracteres especiais e números na sua senha">
                                    </div>

                                    <div class="text-center">
                                        <input type="hidden" name="op" value="atualizar">
                                        <input type="hidden" name="id" value="<?php echo $usuario->getId(); ?>">
                                        <button class="btn btn-primary" type="submit">Enviar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</html>