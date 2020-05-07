
<?php

function listar() {
    $sSql = 'SELECT * '
            . 'FROM MERCADO.TBCLIENTE JOIN MERCADO.TBCIDADE USING (CIDCODIGO)';
    $oResultado = pg_query(getConexao(), $sSql);
    $aTabela = [];

    while ($aLinha = pg_fetch_assoc($oResultado)) {
        array_push($aTabela, $aLinha);
    }
    return $aTabela;
}

function cadastrar($sNome, $iCpf, $iCidade) {
    $sSql = "INSERT INTO MERCADO.TBCLIENTE (clinome,clicpf,cidcodigo) VALUES ('$sNome','$iCpf',$iCidade)";
    pg_query(getConexao(), $sSql);
}

function deletar($iChave) {
    $sSql = 'DELETE FROM MERCADO.TBCLIENTE WHERE clicodigo =' . $iChave . ';';
    pg_query(getConexao(), $sSql);
}

function imprimeTabela($aTabela) {
    if (empty($aTabela)) {
        echo 'Não há registro a serem exibidos';
    }
    echo '<table class="table table-bordered">';
    echo '<tr>';
    echo '<th>Código</th>';
    echo '<th>Nome</th>';
    echo '<th>CPF</th>';
    echo '<th>Cidade</th>';
    echo '<th>Cidade codigo</th>';
    echo '<th>Ações</th>';
    echo '</tr>';
    foreach ($aTabela as $aLinha) {
        echo '<tr>';
        echo '<td>' . $aLinha['clicodigo'] . '</td>';
        echo '<td>' . $aLinha['clinome'] . '</td>';
        echo '<td>' . $aLinha['clicpf'] . '</td>';
        echo '<td>' . $aLinha['cidnome'] . '</td>';
        echo '<td>' . $aLinha['cidcodigo'] . '</td>';
        echo '<td><a href="cliente.php?acao=deletar&registro=' . $aLinha['clicodigo'] . '">Deletar</a></td>';
        echo '</tr>';
    }
    echo '</table>';
}

imprimeTabela(listar());

function imprimeFormularioCadastro() {
    echo '<form method="POST" action="cliente.php?acao=cadastrar">';
    echo '<div class="form-group">';
    echo '<label for="cpf">Nome</label>';
    echo '<input type="text" class="form-control" name="nome" placeholder="" id="" required>';
    echo '<label for="nome">CPF</label>';
    echo '<input type="text" class="form-control" name="cpf" placeholder="" id="" required>';
    echo  '</div>';
    echo ' <div class="form-group">';
    echo '   <label for="sel1">Cidade:</label>';
    echo ' <select class="form-control" name="cidade">';
           select();
    echo ' </select>';
    echo '</div>';
    echo '<button type="submit" class="btn btn-primary">Enviar</button>';
    echo ' </form>';
}

function select() {
    $sSql = 'SELECT *
               FROM MERCADO.TBCIDADE';
    $oResultado = pg_query(getConexao(),$sSql);
    $aTabela = [];
    
    while ($aLinha = pg_fetch_assoc($oResultado)) {
        $aTabela[] = $aLinha; 
    }
    foreach ($aTabela as $aLinha) {
        echo '<option value="'.$aLinha['cidcodigo'].'">'.$aLinha['cidnome'].'</option>';
    }
}