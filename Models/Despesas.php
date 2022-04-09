<?php
class Despesas
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

    public function setDespesa($despesa)
    {
        $this->despesa = $despesa;
    }

    public function getDespesa()
    {
        return $this->despesa;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function getTipo()
    {
        return $this->tipo;
    }
    
    public function setFase($fase)
    {
        $this->fase = $fase;
    }

    public function getFase()
    {
        return $this->fase;
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

    public function consultarGeral($filtro)
    {
        $conexao = new Conexao();
        $con = $conexao->getConnection();

        mysqli_select_db($con, 'sistema_controle');

        $sql = 'select * from despesas where 1 = 1';

        if ($filtro != '') {
            if ($filtro['despesa']) {
                $sql .= " and despesa like '%" . $filtro['despesa'] . "%'";
            }

            if ($filtro['quantidadeInicial'] != '') {
                $sql .= ' and quantidade >= ' . $filtro['quantidadeInicial'];
            }

            if ($filtro['quantidadeFinal'] != '') {
                $sql .= ' and quantidade <= ' . $filtro['quantidadeFinal'];
            }

            if ($filtro['tipo'] != '') {
                $sql .=
                    " and tipo like '%" . $filtro['tipo']. "%'";
            }

            if ($filtro['valorUnitarioInicial'] != '') {
                $sql .=
                    ' and valorUnitario >= ' . $filtro['valorUnitarioInicial'];
            }

            if ($filtro['valorUnitarioFinal'] != '') {
                $sql .=
                    ' and valorUnitario <= ' . $filtro['valorUnitarioFinal'];
            }

            if ($filtro['valorTotalInicial'] != '') {
                $sql .= ' and valorTotal >= ' . $filtro['valorTotalInicial'];
            }

            if ($filtro['valorTotalFinal'] != '') {
                $sql .= ' and valorTotal <= ' . $filtro['valorTotalFinal'];
            }

            if ($filtro['fase'] != '') {
                $sql .=
                    " and fase like '%" . $filtro['fase']. "%'";
            }

            if ($filtro['dataInicial'] != '') {
                $sql .= " and data >= '" . $filtro['dataInicial'] . "'";
            }

            if ($filtro['dataFinal'] != '') {
                $sql .= " and data <= '" . $filtro['dataFinal'] . "'";
            }
        }

        $sql .= ' order by id desc';

        $result = mysqli_query($con, $sql);

        $resultado = [];
        while ($row = $result->fetch_assoc()) {
            array_push($resultado, $row);
        }

        mysqli_close($con);

        return $resultado;
    }

    public function consultarDespesas()
    {
        $conexao = new Conexao();
        $con = $conexao->getConnection();

        mysqli_select_db($con, 'sistema_controle');

        $sql = 'select * from despesas where id = ' . $this->getId();
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
            "insert into despesas (despesa, quantidade, tipo, fase, valorUnitario, valorTotal, data, observacao) values ('" .
            $this->getDespesa() .
            "', " .
            $this->getQuantidade() .
            ", ' ".
            $this->getTipo() .
            "', '" .
            $this->getFase() .
            "', '".
            $this->getValorUnitario() .
            "', '".
            $this->getValorTotal() .
            "', '" .
            $this->getData() .
            "', '" .
            $this->getObservacao() .
            "')";

        mysqli_query($con, $sql);

        mysqli_close($con);
    }

    public function editar()
    {
        $conexao = new Conexao();
        $con = $conexao->getConnection();
        mysqli_select_db($con, 'sistema_controle');

        $sql =
            "update despesas set 
                despesa = '" .
            $this->getDespesa() .
            "', quantidade = '" .
            $this->getQuantidade() .
            "', tipo = '" .
            $this->getTipo() .
            "', fase = '" .
            $this->getFase() .
            "', valorUnitario = '" .
            $this->getValorUnitario() .
            "', valorTotal = '" .
            $this->getValorTotal() .
            "', data = '" .
            $this->getData() .
            "', observacao = '" .
            $this->getObservacao() .
            "' where id = " .
            $this->getId();

        mysqli_query($con, $sql);

        mysqli_close($con);
    }

    public function excluir()
    {
        $conexao = new Conexao();
        $con = $conexao->getConnection();
        mysqli_select_db($con, 'sistema_controle');
        $sql = 'delete from despesas where id = ' . $this->getId();

        mysqli_query($con, $sql);

        mysqli_close($con);
    }
}
