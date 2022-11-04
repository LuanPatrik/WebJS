<?php
    $cep = filter_input(INPUT_POST, 'cep');
    $cidade = filter_input(INPUT_POST, 'localidade');
    $uf = filter_input(INPUT_POST, 'uf');
    $logradouro = filter_input(INPUT_POST, 'logradouro');
    $numero = filter_input(INPUT_POST, 'numero');
    $bairro = filter_input(INPUT_POST, 'bairro');

    if ($cep && $cidade && $logradouro && $numero && $bairro) {
        //Insert no banco
        $retorno = ['status' => 'ok', 'mensagem' => 'Dados gravados com sucesso!'];
    }else {
        $retorno = ['status' => 'error', 'mensagem' => 'Preencha todos os campos!'];
    }
    echo json_encode($retorno);
?>