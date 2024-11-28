<?php

include "modules/connection.php";
include "modules/taghtml.php";

$conn = (new Connection)->getConnection();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nome_comprador = $_POST['nome'];
    $telefone_comprador = $_POST['telefone'];
    $endereco_comprador = $_POST['endereco'];

    $sql = "INSERT INTO comprador(nome, telefone, endereco) VALUES (:nome, :telefone, :endereco)";
    $stmt = $conn->prepare($sql);

    $stmt->bindValue("nome",$nome_comprador);
    $stmt->bindValue("telefone",$telefone_comprador);
    $stmt->bindValue("endereco",$endereco_comprador);
    
    $stmt->execute();

    header("location:index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Comprador - Padaria Pão Fofo</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark justify-content-center">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="index.php" class="nav-link">Página Inicial</a>
            </li>
            <li class="nav-item">
                <a href="vendas.php" class="nav-link">Registro de Vendas</a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" role="button" class="nav-link active dropdown-toggle" data-bs-toggle="dropdown">Cadastros</a>
                <ul class="dropdown-menu">
                    <li><a href="cadastro_comprador.php" class="dropdown-item">Cadastrar Comprador</a></li>
                    <li><a href="cadastro_produto.php" class="dropdown-item">Cadastrar Produto</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div class="container mt-5 justify-content-center">
        <p class="h1 text-center mb-5">Cadastrar Comprador</p>
        <form action="cadastro_comprador.php" method="post" class="mb-3">
            <div class="mb-3 mt-3">
                <label for="nome" class="form-label">Nome do Comprador:</label>
                <input type="text" name="nome" id="nome" maxlength="50" required class="form-control">
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone do Comprador:</label>
                <input type="number" name="telefone" id="telefone" class="form-control" min="0" placeholder="5199145623" required/>
            </div>
            <div class="mb-3 mt-3">
                <label for="endereco" class="form-label">Endereço do Comprador:</label>
                <input type="text" name="endereco" id="endereco" maxlength="100" required class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar comprador</button>
        </form>
    </div>
</body>
</html>