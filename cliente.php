<!DOCTYPE html>
<html>
    <head>
        <meta charset="windows-1252">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <title>Cliente</title>
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

            <div id="conteudo" class="container">
                <h2 class="text-center">Cliente</h2>
                <?php
                require_once 'conexao.php';
                require_once 'funcoes_cliente.php';

                if (isset($_GET['acao'])) {
                    switch ($_GET['acao']) {
                        case 'cadastrar':
                            cadastrar($_POST['nome'],$_POST['cpf'],$_POST['cidade']); 
                            break;
                        case 'deletar':
                            deletar($_GET['registro']);
                            break;
                        default:
                            echo 'Não foi possível completar o cadastro ';
                            break;
                    }
                }
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





