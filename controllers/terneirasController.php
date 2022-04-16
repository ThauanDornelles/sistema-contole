<?php
include '../Database/Conexao.php';
include '../Models/Terneiras.php';
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
    $terneira = new Terneira();

    $filtro = '';

    if ($_POST['filtro'] != '') {
        $filtro = json_decode($_POST['filtro'], true);
    }

    $valor = $terneira->consultarGeral($filtro);

    echo json_encode($valor);
}

function consultar()
{
    $terneira = new Terneira();
    $terneira->setId($_POST['id']);

    $valor = $terneira->consultar();

    echo json_encode($valor);
}

function inserir()
{
    $terneira = new Terneira();
    $terneira->setNumeroBrinco($_POST['numeroBrinco']);
    $terneira->setNumeroPai($_POST['numeroPai']);
    $terneira->setNumeroMae($_POST['numeroMae']);
    $terneira->setPeso($_POST['peso']);
    $terneira->setData($_POST['data']);

    $terneira->inserir();

    echo json_encode('ok: "ok"');
}

function editar()
{
    $terneira = new Terneira();
    $terneira->setId($_POST['id']);
    $terneira->setNumeroBrinco($_POST['numeroBrinco']);
    $terneira->setNumeroPai($_POST['numeroPai']);
    $terneira->setNumeroMae($_POST['numeroMae']);
    $terneira->setPeso($_POST['peso']);
    $terneira->setData($_POST['data']);

    $terneira->editar();

    echo json_encode('ok: "ok"');
}

function excluir()
{
    $terneira = new Terneira();
    $terneira->setId($_POST['id']);

    $terneira->excluir();

    echo json_encode('ok: "ok"');
}
