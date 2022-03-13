<?php
include '../Database/Conexao.php';
include '../Models/Receitas.php';
$funcao = $_POST['function'];

switch ($funcao) {
    case 'consultar':
        consultarReceitas();
        break;

    case 'inserir':
        inserirReceita();
        break;

    case 'excluir':
        excluirReceita();
        break;
}

if ($funcao == 'consulta') {
    consultarReceitas();
}

function consultarReceitas()
{
    $receitas = new Receitas();
    $valor = $receitas->consultar();

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

function excluirReceita()
{
    $receitas = new Receitas();
    $receitas->setId($_POST['id']);

    $receitas->excluir();

    echo json_encode('ok: "ok"');
}
