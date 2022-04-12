<?php
include '../Database/Conexao.php';
include '../Models/Novilhos.php';
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
    $novilho = new Novilho();

    $filtro = '';

    if ($_POST['filtro'] != '') {
        $filtro = json_decode($_POST['filtro'], true);
    }

    $valor = $novilho->consultarGeral($filtro);

    echo json_encode($valor);
}

function consultar()
{
    $novilho = new Novilho();
    $novilho->setId($_POST['id']);

    $valor = $novilho->consultar();

    echo json_encode($valor);
}

function inserir()
{
    $novilho = new Novilho();
    $novilho->setNumeroBrinco($_POST['numeroBrinco']);
    $novilho->setNumeroPai($_POST['numeroPai']);
    $novilho->setNumeroMae($_POST['numeroMae']);
    $novilho->setPeso($_POST['peso']);
    $novilho->setData($_POST['data']);

    $novilho->inserir();

    echo json_encode('ok: "ok"');
}

function editar()
{
    $novilho = new Novilho();
    $novilho->setId($_POST['id']);
    $novilho->setNumeroBrinco($_POST['numeroBrinco']);
    $novilho->setNumeroPai($_POST['numeroPai']);
    $novilho->setNumeroMae($_POST['numeroMae']);
    $novilho->setPeso($_POST['peso']);
    $novilho->setData($_POST['data']);

    $novilho->editar();

    echo json_encode('ok: "ok"');
}

function excluir()
{
    $novilho = new Novilho();
    $novilho->setId($_POST['id']);

    $novilho->excluir();

    echo json_encode('ok: "ok"');
}
