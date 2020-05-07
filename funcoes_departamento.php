
<?php

function listar() {
    $sSql = 'SELECT * '
            . 'FROM MERCADO.TBDEPARTAMENTO';
    $oResultado = pg_query(getConexao(), $sSql);
    $aTabela = [];

    while ($aLinha = pg_fetch_assoc($oResultado)) {
        array_push($aTabela, $aLinha);
    }
    return $aTabela;
}

function cadastrar($sDescricao){
    $sSql = "INSERT INTO MERCADO.TBDEPARTAMENTO (dptdescricao) VALUES ('$sDescricao')";
    pg_query(getConexao(), $sSql);
}

function deletar($iChave){
    $sSql = 'DELETE FROM MERCADO.TBDEPARTAMENTO WHERE dptcodigo ='.$iChave. ';';
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
        echo '<td>' . $aLinha['dptcodigo'] . '</td>';
        echo '<td>' . $aLinha['dptdescricao'] . '</td>';
        echo '<td><a href="departamento.php?acao=deletar&registro='.$aLinha['dptcodigo'].'">Deletar</a></td>';
        echo '</tr>';
    }
    echo '</table>';
}

imprimeTabela(listar());

function imprimeFormularioCadastro() {
    echo '
          <form method="POST" action="departamento.php?acao=cadastrar">
          <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" name="descricao" placeholder="" id="" required>
          </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>';
    
}








