<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Página Inicial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="categoria.php">Categoria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="departamento.php">Departamento</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cidade.php">Cidade</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cliente.php">Cliente</a>
                </li>
            </ul>
        </div>
    </nav> 
    <div class="container">
        <h2 class="text-center">Departamento</h2>
        <?php
        require_once 'conexao.php';
        require_once 'funcoes_departamento.php';

        if (isset($_GET['acao'])) {
            switch ($_GET['acao']) {
                case 'cadastrar':
                    cadastrar($_POST['descricao']);
                    break;
                case 'deletar':
                    deletar($_GET['registro']);
                    break;
                default:
                    break;
            }
        }
        listar();
        imprimeFormularioCadastro();
        ?>
    </div>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>

<?php



