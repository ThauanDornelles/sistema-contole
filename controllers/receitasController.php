<?php
include '../Models/Receitas.php';
$funcao = $_POST['function'];

if ($funcao == 'consulta') {
    consultarReceitas();
}

function consultarReceitas()
{
    $receitas = new Receitas();
    $valor = $receitas->consultar();

    echo json_encode($valor);
}
