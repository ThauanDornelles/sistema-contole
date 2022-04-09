<?php
include '../Database/Conexao.php';
include '../Models/Despesas.php';
$funcao = $_POST['function'];

switch ($funcao) {
    case 'consultarGeral':
        consultarDespesasGeral();
        break;

    case 'consultar':
        consultarDespesas();
        break;

    case 'inserir':
        inserirDespesas();
        break;

    case 'editar':
        editarDespesas();
        break;

    case 'excluir':
        excluirDespesas();
        break;
}

function consultarDespesasGeral()
{
    $despesas = new Despesas();

    $filtro = '';

    if ($_POST['filtro'] != '') {
        $filtro = json_decode($_POST['filtro'], true);
    }

    $valor = $despesas->consultarGeral($filtro);

    echo json_encode($valor);
}

function consultarDespesas()
{
    $despesas = new Despesas();
    $despesas->setId($_POST['id']);

    $valor = $despesas->consultarDespesas();

    echo json_encode($valor);
}

function inserirDespesas()
{
    $despesas = new Despesas();
    $despesas->setDespesa($_POST['despesa']);
    $despesas->setQuantidade($_POST['quantidade']);
    $despesas->setData($_POST['data']);
    $despesas->setTipo($_POST['tipo']);
    $despesas->setFase($_POST['fase']);
    $despesas->setValorUnitario($_POST['valorUnitario']);
    $despesas->setValorTotal($_POST['valorTotal']);
    $despesas->setObservacao(
        $_POST['observacao'] !== null ? $_POST['observacao'] : ''
    );

    $despesas->inserir();

    echo json_encode('ok: "ok"');
}

function editarDespesas()
{
    $despesas = new Despesas();
    $despesas->setId($_POST['id']);
    $despesas->setDespesa($_POST['despesa']);
    $despesas->setQuantidade($_POST['quantidade']);
    $despesas->setData($_POST['data']);
    $despesas->setTipo($_POST['tipo']);
    $despesas->setFase($_POST['fase']);
    $despesas->setValorUnitario($_POST['valorUnitario']);
    $despesas->setValorTotal($_POST['valorTotal']);
    $despesas->setObservacao(
        $_POST['observacao'] !== null ? $_POST['observacao'] : ''
    );

    $despesas->editar();

    echo json_encode('ok: "ok"');
}

function excluirDespesas()
{
    $despesas = new Despesas();
    $despesas->setId($_POST['id']);

    $despesas->excluir();

    echo json_encode('ok: "ok"');
}

