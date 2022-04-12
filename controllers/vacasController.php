<?php
include '../Database/Conexao.php';
include '../Models/Vacas.php';
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
    $vaca = new Vaca();

    $filtro = '';

    if ($_POST['filtro'] != '') {
        $filtro = json_decode($_POST['filtro'], true);
    }

    $valor = $vaca->consultarGeral($filtro);

    echo json_encode($valor);
}

function consultar()
{
    $vaca = new Vaca();
    $vaca->setId($_POST['id']);

    $valor = $vaca->consultar();

    echo json_encode($valor);
}

function inserir()
{
    $vaca = new Vaca();
    $vaca->setNumeroBrinco($_POST['numeroBrinco']);
    $vaca->setNumeroPai($_POST['numeroPai']);
    $vaca->setNumeroMae($_POST['numeroMae']);
    $vaca->setPeso($_POST['peso']);
    $vaca->setData($_POST['data']);

    $vaca->inserir();

    echo json_encode('ok: "ok"');
}

function editar()
{
    $vaca = new Vaca();
    $vaca->setId($_POST['id']);
    $vaca->setNumeroBrinco($_POST['numeroBrinco']);
    $vaca->setNumeroPai($_POST['numeroPai']);
    $vaca->setNumeroMae($_POST['numeroMae']);
    $vaca->setPeso($_POST['peso']);
    $vaca->setData($_POST['data']);

    $vaca->editar();

    echo json_encode('ok: "ok"');
}

function excluir()
{
    $vaca = new Vaca();
    $vaca->setId($_POST['id']);

    $vaca->excluir();

    echo json_encode('ok: "ok"');
}
