<?php

session_start();
  
include_once './conexao.php';

if ((isset($_POST['email'])) && (isset($_POST['senha']))) {
    $usuario = pg_escape_string($sConexao, $_POST['email']);
    $senha = pg_escape_string($sConexao, $_POST['senha']);
    

    //Buscar na tabela o usuário que corresponde com os dados digitado no formulário
    $result_usuario = "SELECT * FROM MERCADO.TBAUTENTICACAO WHERE autlogin = $usuario AND autsenha = $senha LIMIT 1";
    $resultado_usuario = pg_query($sConexao, $result_usuario);
    $resultado = pg_fetch_assoc($resultado_usuario);

    //Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
    if (($resultado == pg_fetch_assoc($resultado_usuario)) ) {
        header("Location: cliente.php");
        }
    } else {
        
        $_SESSION['loginErro'] = "Usuário ou senha Inválido";
        header("Location: index.php");
    }else {
        
        $_SESSION['loginErro'] = "Usuário ou senha Inválido";
        header("Location: index.php");
    }
    //O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login


    