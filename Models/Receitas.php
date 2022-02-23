<?php
class Receitas
{
    private $receitas;
    private $quantidade;
    private $peso;
    private $valorUnitario;
    private $valorTotal;
    private $valor;
    private $data;
    private $observacao;

    public function setReceitas($receitas)
    {
        $this->receitas = $receitas;
    }

    public function getReceitas()
    {
        return $this->receitas;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setPeso($peso)
    {
        $this->peso = $peso;
    }

    public function getPeso()
    {
        return $this->peso;
    }

    public function setValorUnitario($valorUnitario)
    {
        $this->valorUnitario = $valorUnitario;
    }

    public function getValorUnitario()
    {
        return $this->valorUnitario;
    }

    public function setValorTotal($valorTotal)
    {
        $this->valorTotal = $valorTotal;
    }

    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;
    }

    public function getObservacao()
    {
        return $this->observacao;
    }

    public function consultar()
    {
        include '../Database/Conexao.php';

        $conexao = new Conexao();
        $con = $conexao->getConnection();
        mysqli_select_db($con, 'acaivintepila');
        $sql = 'select * from cortes order by id desc limit 6';
        $result = mysqli_query($con, $sql);

        $resultado = [];
        while ($row = $result->fetch_assoc()) {
            array_push($resultado, $row);
        }

        // $sql = $conexao->prepare(
        //     'select * from receitas order by id desc limit 6'
        // );

        return $resultado;
    }
}
