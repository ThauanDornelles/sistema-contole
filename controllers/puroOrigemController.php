<?php
include '../Database/Conexao.php';
include '../Models/PurosOrigens.php';
$funcao = $_POST['function'];

switch ($funcao) {
    case 'consultarGeral':
        consultarGeral();
        break;

    case 'consultar':
        consultar();
        break;

    case 'inserir':
        inserir();
        break;

    case 'editar':
        editar();
        break;

    case 'excluir':
        excluir();
        break;
}

function consultarGeral()
{
    $puroOrigem = new PuroOrigem();

    $filtro = '';

    if ($_POST['filtro'] != '') {
        $filtro = json_decode($_POST['filtro'], true);
    }

    $valor = $puroOrigem->consultarGeral($filtro);

    echo json_encode($valor);
}

function consultar()
{
    $puroOrigem = new PuroOrigem();
    $puroOrigem->setId($_POST['id']);

    $valor = $puroOrigem->consultar();

    echo json_encode($valor);
}

function inserir()
{
    $puroOrigem = new PuroOrigem();
    $puroOrigem->setNumeroBrinco($_POST['numeroBrinco']);
    $puroOrigem->setNumeroPai($_POST['numeroPai']);
    $puroOrigem->setNumeroMae($_POST['numeroMae']);
    $puroOrigem->setPeso($_POST['peso']);
    $puroOrigem->setData($_POST['data']);

    $puroOrigem->inserir();

    echo json_encode('ok: "ok"');
}

function editar()
{
    $puroOrigem = new PuroOrigem();
    $puroOrigem->setId($_POST['id']);
    $puroOrigem->setNumeroBrinco($_POST['numeroBrinco']);
    $puroOrigem->setNumeroPai($_POST['numeroPai']);
    $puroOrigem->setNumeroMae($_POST['numeroMae']);
    $puroOrigem->setPeso($_POST['peso']);
    $puroOrigem->setData($_POST['data']);

    $puroOrigem->editar();

    echo json_encode('ok: "ok"');
}

function excluir()
{
    $puroOrigem = new PuroOrigem();
    $puroOrigem->setId($_POST['id']);

    $puroOrigem->excluir();

    echo json_encode('ok: "ok"');
}
