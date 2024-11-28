<?php

include "modules/connection.php";
include "modules/taghtml.php";

$conn = (new Connection)->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comprador = $_POST['comprador'];
    $produtos = $_POST['produtos'];

    if (!(isset($comprador) && isset($produtos) && is_array($produtos))) {
        exit;
    }

    $sql = "INSERT INTO venda(id_comprador) VALUES (:comprador)";
    $stmt = $conn->prepare($sql);

    $stmt->bindValue("comprador",$comprador);
    $stmt->execute();

    header("location:".__FILE__.".php");
    exit;
}

function GetCompradores() {
    global $conn;

    try {
        $sql = "SELECT id, nome FROM comprador";
        $stmt = $conn->prepare($sql);
    
        $stmt->execute();
    
        $lista_comprador = [];
        if ($stmt->rowCount() > 0) {
            $lista_comprador = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    
        $compradores = "";
    
        foreach ($lista_comprador as $key => $value) {
            $option = new tagHtml;
            $option->setTag("option");
            $option->setValue($value['nome']);
            $option->addAtribute("value",$value['id']);
            $compradores .= $option->mount();
        }
    
        return $compradores;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function GetProdutos() {
    global $conn;

    try {
        $sql = "SELECT * FROM produto";
        $stmt = $conn->prepare($sql);
    
        $stmt->execute();
    
        $lista_produto = [];
        if ($stmt->rowCount() > 0) {
            $lista_produto = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    
        $produtos = "";
    
        foreach ($lista_produto as $key => $value) {
            $option = new tagHtml;
            $option->setTag("option");
            $option->setValue($value['nome']);
            $option->addAtribute("value",$value['id']);
            $produtos .= $option->mount();
        }

        return $produtos;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

$compradores = GetCompradores();
$produtos = GetProdutos();

?>

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
                <a href="index.php" class="nav-link">Página Inicial</a>
            </li>
            <li class="nav-item">
                <a href="vendas.php" class="nav-link active">Registro de Vendas</a>
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
        <p class="h1 text-center mb-5">Registro de Vendas</p>
        <div class="row">
            <div class="col border-top border-bottom">
                <p class="h2 text-center">
                    Tabela de Vendas
                </p>
            </div>
            <div class="col bg-light">
                <p class="h2 text-center">
                    Efetuar Venda
                </p>
                <form action="vendas.php" method="post" class="mb-3">
                    <div class="mb-3 mt-3">
                        <label for="comprador" class="form-label">Comprador:</label>
                        <select name="comprador" id="comprador" class="form-select">
                            <option value="">Selecione um comprador</option>
                            <?php echo $compradores; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="produto" class="form-label">Produto:</label>
                        <select name="produto" id="produto" class="form-select">
                            <option value="">Selecione um produto</option>
                            <?php echo $produtos; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Efetuar Venda</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>