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

    public function consultarGeral($filtro)
    {
        $conexao = new Conexao();
        $con = $conexao->getConnection();

        mysqli_select_db($con, 'sistema_controle');

        $sql = 'select * from receitas where 1 = 1';

        if ($filtro != '') {
            if ($filtro['receita']) {
                $sql .= " and receita like '%" . $filtro['receita'] . "%'";
            }

            if ($filtro['quantidadeInicial'] != '') {
                $sql .= ' and quantidade >= ' . $filtro['quantidadeInicial'];
            }

            if ($filtro['quantidadeFinal'] != '') {
                $sql .= ' and quantidade <= ' . $filtro['quantidadeFinal'];
            }

            if ($filtro['pesoInicial'] != '') {
                $sql .= ' and peso >= ' . $filtro['pesoInicial'];
            }

            if ($filtro['pesoFinal'] != '') {
                $sql .= ' and peso <= ' . $filtro['pesoFinal'];
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

    public function consultarMovimentacao()
    {
        $conexao = new Conexao();
        $con = $conexao->getConnection();

        mysqli_select_db($con, 'sistema_controle');

        $sql = 'select * from receitas where id = ' . $this->getId();
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

    public function editar()
    {
        $conexao = new Conexao();
        $con = $conexao->getConnection();
        mysqli_select_db($con, 'sistema_controle');

        $sql =
            "update receitas set 
                receita = '" .
            $this->getReceita() .
            "', quantidade = '" .
            $this->getQuantidade() .
            "', peso = '" .
            $this->getPeso() .
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
        $sql = 'delete from receitas where id = ' . $this->getId();

        mysqli_query($con, $sql);

        mysqli_close($con);
    }
}
