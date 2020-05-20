<?php

include_once './conexao.php';
include_once './funcoes_cliente.php';

alterar($_GET['registro'],$_GET['nome'], $_GET['cpf'], $_GET['cidade']);
header('Location:cliente.php');


  



//$sSql = "UPDATE MERCADO.TBCLIENTE SET clinome='$sNome',clicpf='$iCpf',cidnome='$iCidade' FROM MERCADO.TBCLIENTE JOIN MERCADO.TBCIDADE ON clicodigo='$iClicodigo = clicodigo='$iClicodigo'";
