<?php
class Receitas
{
    private $id;
    private $receita;
    private $quantidade;
    private $peso;
    private $valorUnitario;
    private $valorTotal;
    private $valor;
    private $data;
    private $observacao;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setReceita($receita)
    {
        $this->receita = $receita;
    }

    public function getReceita()
    {
        return $this->receita;
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
        $conexao = new Conexao();
        $con = $conexao->getConnection();
        mysqli_select_db($con, 'sistema_controle');
        $sql = 'select * from receitas order by id desc';
        $result = mysqli_query($con, $sql);

        $resultado = [];
        while ($row = $result->fetch_assoc()) {
            array_push($resultado, $row);
        }

        mysqli_close($con);

        return $resultado;
    }

    public function inserir()
    {
        $conexao = new Conexao();
        $con = $conexao->getConnection();
        mysqli_select_db($con, 'sistema_controle');
        $sql =
            "insert into receitas (receita, quantidade, peso, valorUnitario, valorTotal, data, observacao) values ('" .
            $this->getReceita() .
            "', " .
            $this->getQuantidade() .
            ', ' .
            $this->getPeso() .
            ', ' .
            $this->getValorUnitario() .
            ', ' .
            $this->getValorTotal() .
            ", '" .
            $this->getData() .
            "', '" .
            $this->getObservacao() .
            "')";

        mysqli_query($con, $sql);

        mysqli_close($con);
    }

    public function excluir()
    {
        $conexao = new Conexao();
        $con = $conexao->getConnection();
        mysqli_select_db($con, 'sistema_controle');
        $sql = 'delete from receitas where id = ' . $this->getId();

        mysqli_query($con, $sql);

        mysqli_close($con);
    }
}
