
<?php

function listar() {
    $sSql = 'SELECT * FROM MERCADO.TBCIDADE';
    $oResultado = pg_query(getConexao(), $sSql);
    $aTabela = [];

    while ($aLinha = pg_fetch_assoc($oResultado)) {
        array_push($aTabela, $aLinha);
    }
    return $aTabela;
}

function cadastrar($sNome){
    $sSql = "INSERT INTO MERCADO.TBCIDADE (cidnome) VALUES ('$sNome')";
    pg_query(getConexao(), $sSql);
}

function deletar($iChave){
    $sSql = 'DELETE FROM MERCADO.TBCIDADE WHERE cidcodigo ='.$iChave. ';';
    pg_query(getConexao(), $sSql);
    
}

function imprimeTabela($aTabela) {
    if (empty($aTabela)){
        echo 'Não há registro a serem exibidos';
    }
    echo '<table class="table table-bordered">';
    echo '<tr>';    
    echo '<th>Código</th>';
    echo '<th>Nome</th>';
    echo '<th>Ações</th>';
    echo '</tr>';
    foreach ($aTabela as $aLinha) {
        echo '<tr>';
        echo '<td>' . $aLinha['cidcodigo'] . '</td>';
        echo '<td>' . $aLinha['cidnome'] . '</td>';
        echo '<td><a href="cidade.php?acao=deletar&registro='.$aLinha['cidcodigo'].'">Deletar</a></td>';
        echo '</tr>';
    }
    echo '</table>';
}

imprimeTabela(listar());

function imprimeFormularioCadastro() {
    echo '
          <form method="POST" action="cidade.php?acao=cadastrar">
          <div class="form-group">
            <label for="nome">Cadastrar cidade</label>
            <input type="text" class="form-control" name="nome" placeholder="" id="" required>
          </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>';
    
}










