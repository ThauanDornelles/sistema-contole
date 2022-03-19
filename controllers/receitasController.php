<?php
include '../Database/Conexao.php';
include '../Models/Receitas.php';
$funcao = $_POST['function'];

switch ($funcao) {
    case 'consultarGeral':
        consultarReceitasGeral();
        break;

    case 'consultar':
        consultarReceita();
        break;

    case 'inserir':
        inserirReceita();
        break;

    case 'editar':
        editarReceita();
        break;

    case 'excluir':
        excluirReceita();
        break;
}

function consultarReceitasGeral()
{
    $receitas = new Receitas();

    $filtro = '';

    if ($_POST['filtro'] != '') {
        $filtro = json_decode($_POST['filtro'], true);
    }

    $valor = $receitas->consultarGeral($filtro);

    echo json_encode($valor);
}

function consultarReceita()
{
    $receitas = new Receitas();
    $receitas->setId($_POST['id']);

    $valor = $receitas->consultarReceita();

    echo json_encode($valor);
}

function inserirReceita()
{
    $receitas = new Receitas();
    $receitas->setReceita($_POST['receita']);
    $receitas->setQuantidade($_POST['quantidade']);
    $receitas->setPeso($_POST['peso']);
    $receitas->setValorUnitario($_POST['valorUnitario']);
    $receitas->setValorTotal($_POST['valor']);
    $receitas->setData($_POST['data']);
    $receitas->setObservacao(
        $_POST['observacao'] !== null ? $_POST['observacao'] : ''
    );

    $receitas->inserir();

    echo json_encode('ok: "ok"');
}

function editarReceita()
{
    $receitas = new Receitas();
    $receitas->setId($_POST['id']);
    $receitas->setReceita($_POST['receita']);
    $receitas->setQuantidade($_POST['quantidade']);
    $receitas->setPeso($_POST['peso']);
    $receitas->setValorUnitario($_POST['valorUnitario']);
    $receitas->setValorTotal($_POST['valor']);
    $receitas->setData($_POST['data']);
    $receitas->setObservacao(
        $_POST['observacao'] !== null ? $_POST['observacao'] : ''
    );

    $receitas->editar();

    echo json_encode('ok: "ok"');
}

function excluirReceita()
{
    $receitas = new Receitas();
    $receitas->setId($_POST['id']);

    $receitas->excluir();

    echo json_encode('ok: "ok"');
}
