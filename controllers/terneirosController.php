<?php
include '../Database/Conexao.php';
include '../Models/Terneiros.php';
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
    $terneiro = new Terneiro();

    $filtro = '';

    if ($_POST['filtro'] != '') {
        $filtro = json_decode($_POST['filtro'], true);
    }

    $valor = $terneiro->consultarGeral($filtro);

    echo json_encode($valor);
}

function consultar()
{
    $terneiro = new Terneiro();
    $terneiro->setId($_POST['id']);

    $valor = $terneiro->consultar();

    echo json_encode($valor);
}

function inserir()
{
    $terneiro = new Terneiro();
    $terneiro->setNumeroBrinco($_POST['numeroBrinco']);
    $terneiro->setNumeroPai($_POST['numeroPai']);
    $terneiro->setNumeroMae($_POST['numeroMae']);
    $terneiro->setPeso($_POST['peso']);
    $terneiro->setData($_POST['data']);

    $terneiro->inserir();

    echo json_encode('ok: "ok"');
}

function editar()
{
    $terneiro = new Terneiro();
    $terneiro->setId($_POST['id']);
    $terneiro->setNumeroBrinco($_POST['numeroBrinco']);
    $terneiro->setNumeroPai($_POST['numeroPai']);
    $terneiro->setNumeroMae($_POST['numeroMae']);
    $terneiro->setPeso($_POST['peso']);
    $terneiro->setData($_POST['data']);

    $terneiro->editar();

    echo json_encode('ok: "ok"');
}

function excluir()
{
    $terneiro = new Terneiro();
    $terneiro->setId($_POST['id']);

    $terneiro->excluir();

    echo json_encode('ok: "ok"');
}
