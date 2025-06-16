<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="app/assets/css/style-cadastro.css"/>
    <link rel="shortcut icon" type="imagex/png" class="justified" href="app/assets/img/logo.png">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="container">
            <a class="navbar-brand" href="./index.php">
                    <h1 class="lead">BUSIFSC</h1>
                </a>
                <a class="btn btn-primary" href="./index.php">Entrar</a>
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
                                <h2>Cadastre-se aqui!</h2>
                            </div>
    
                            <form class="p-4" name="form-contato" method="post" action="./app/controllers/usuarios.php">
                                <p class="lead center">Insira seus dados para cadastramos seu usuário.</p>
    
                                <div class="mb-4">
                                    <label for="inputNome" class="form-label inputs">Nome</label>
                                    <input type="text" name="nome" class="form-control placeholder border-white no-outline pblack" id="inputNome" placeholder="Endereço de nome" required>
                                    <div class="invalid-feedback" id="nomeError">Por favor, preencha seu nome.</div>
                                </div>
    
                                <div class="mb-4">
                                    <label for="inputEmail" class="form-label inputs">Email</label>
                                    <input type="email" name="email" class="form-control placeholder border-white no-outline pblack" id="inputEmail" placeholder="Endereço de e-mail" required>
                                    <div class="invalid-feedback" id="emailError">Por favor, preencha seu email.</div>
                                </div>
    
                                <div class="mb-4">
                                    <label for="inputSenha" class="form-label inputs">Senha</label>
                                    <input type="password" name="senha" class="form-control placeholder border-white no-outline pblack" id="inputSenha" placeholder="Senha" required>
                                    <div class="invalid-feedback" id="senhaError">Por favor, insira uma senha válida.</div>
                                </div>
    
                                <div class="text-center">
                                     <input type="hidden" name="op" value="cadastrar">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

    <!-- <footer class="footer custom-footer">
        <div class="container">
            <p class=" texto-footer text-center mt-4"></p>
        </div>
    </footer> -->
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>