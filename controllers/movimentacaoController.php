<?php
include '../Database/Conexao.php';
include '../Models/Movimentacao.php';
$funcao = $_POST['function'];

switch ($funcao) {
    case 'consultarGeral':
        consultarMovimentacaoGeral();
        break;

    case 'consultar':
        consultarMovimentacao();
        break;

    case 'inserir':
        inserirMovimentacao();
        break;

    case 'editar':
        editarMovimentacao();
        break;

    case 'excluir':
        excluirMovimentacao();
        break;
}

function consultarMovimentacaoGeral()
{
    $movimentacao = new Movimentacao();

    $filtro = '';

    if ($_POST['filtro'] != '') {
        $filtro = json_decode($_POST['filtro'], true);
    }

    $valor = $movimentacao->consultarGeral($filtro);

    echo json_encode($valor);
}

function consultarMovimentacao()
{
    $movimentacao = new Movimentacao();
    $movimentacao->setId($_POST['id']);

    $valor = $movimentacao->consultarMovimentacao();

    echo json_encode($valor);
}

function inserirMovimentacao()
{
    $movimentacao = new Movimentacao();
    $movimentacao->setNumero($_POST['numero']);
    $movimentacao->setPeso($_POST['peso']);
    $movimentacao->setData($_POST['data']);
    $movimentacao->setFaseOrigem($_POST['faseOrigem']);
    $movimentacao->setFaseDestino($_POST['faseDestino']);

    $movimentacao->inserir();

    echo json_encode('ok: "ok"');
}

function editarMovimentacao()
{
    $movimentacao = new Movimentacao();
    $movimentacao->setId($_POST['id']);
    $movimentacao->setNumero($_POST['numero']);
    $movimentacao->setPeso($_POST['peso']);
    $movimentacao->setFaseOrigem($_POST['faseOrigem']);
    $movimentacao->setFaseDestino($_POST['faseDestino']);
    $movimentacao->setData($_POST['data']);

    $movimentacao->editar();

    echo json_encode('ok: "ok"');
}

function excluirMovimentacao()
{
    $movimentacao = new Movimentacao();
    $movimentacao->setId($_POST['id']);

    $movimentacao->excluir();

    echo json_encode('ok: "ok"');
}

