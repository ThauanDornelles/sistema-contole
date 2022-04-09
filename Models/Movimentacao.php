<?php
class Movimentacao
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

    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setPeso($peso)
    {
        $this->peso = $peso;
    }

    public function getPeso()
    {
        return $this->peso;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setFaseOrigem($faseOrigem)
    {
        $this->faseOrigem = $faseOrigem;
    }

    public function getFaseOrigem()
    {
        return $this->faseOrigem;
    }

    public function setFaseDestino($faseDestino)
    {
        $this->faseDestino = $faseDestino;
    }

    public function getFaseDestino()
    {
        return $this->faseDestino;
    }

    public function consultarGeral($filtro)
    {
        $conexao = new Conexao();
        $con = $conexao->getConnection();

        mysqli_select_db($con, 'sistema_controle');

        $sql = 'select * from movimentacao where 1 = 1';

        if ($filtro != '') {
            if ($filtro['numeroInicial']) {
                $sql .= " and numero >= " . $filtro['numeroInicial'];
            }

            if ($filtro['numeroFinal']) {
                $sql .= " and numero <= " . $filtro['numeroFinal'];
            }

            if ($filtro['pesoInicial'] != '') {
                $sql .= " and peso >= " . $filtro['pesoInicial'];
            }

            if ($filtro['pesoFinal'] != '') {
                $sql .= " and peso <= " . $filtro['pesoFinal'];
            }

            if ($filtro['faseOrigem'] != '') {
                $sql .=
                    " and origem = '%" . $filtro['faseOrigem']."%'";
            }

            if ($filtro['faseDestino'] != '') {
                $sql .=
                    " and destino like '%" . $filtro['faseDestino']. "%'";
            }

            if ($filtro['dataInicial'] != '') {
                $sql .= " and data >= '" . $filtro['dataInicial']. "'";
            }

            if ($filtro['dataFinal'] != '') {
                $sql .= " and data <= '" . $filtro['dataFinal']. "'";
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

        $sql = 'select * from movimentacao where id = ' . $this->getId();
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
            "insert into movimentacao (numero, data, peso, origem, destino) values (" .
            $this->getNumero() .
            ", '" .
            $this->getData() .
            "', '" .
            $this->getPeso() .
            "', '" .
            $this->getFaseOrigem() .
            "', '" .
            $this->getFaseDestino() .
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
            "update movimentacao set 
                numero = '" .
            $this->getNumero() .
            "', data = '" .
            $this->getData() .
            "', peso = '" .
            $this->getPeso() .
            "', origem = '" .
            $this->getFaseOrigem() .
            "', destino = '" .
            $this->getFaseDestino() .
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
        $sql = 'delete from movimentacao where id = ' . $this->getId();

        mysqli_query($con, $sql);

        mysqli_close($con);
    }
}
