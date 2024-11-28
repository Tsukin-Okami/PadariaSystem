<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Padaria Pão Fofo</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark justify-content-center">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="index.php" class="nav-link active">Página Inicial</a>
            </li>
            <li class="nav-item">
                <a href="vendas.php" class="nav-link">Registro de Vendas</a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" role="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Cadastros</a>
                <ul class="dropdown-menu">
                    <li><a href="cadastro_comprador.php" class="dropdown-item">Cadastrar Comprador</a></li>
                    <li><a href="cadastro_produto.php" class="dropdown-item">Cadastrar Produto</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div class="container mt-5 justify-content-center">
        <p class="h1 text-center mb-5">Padaria Pão Fofo</p>
        <img src="img/pao.jpg" alt="Pão de forma" class="img-thumbnail mx-auto d-block">
    </div>
</body>
</html>