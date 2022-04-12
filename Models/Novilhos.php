<?php
class Novilho
{
    private $id;
    private $numeroBrinco;
    private $numeroPai;
    private $numeroMae;
    private $data;
    private $peso;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNumeroBrinco($numeroBrinco)
    {
        $this->numeroBrinco = $numeroBrinco;
    }

    public function getNumeroBrinco()
    {
        return $this->numeroBrinco;
    }

    public function setNumeroPai($numeroPai)
    {
        $this->numeroPai = $numeroPai;
    }

    public function getNumeroPai()
    {
        return $this->numeroPai;
    }

    public function setNumeroMae($numeroMae)
    {
        $this->numeroMae = $numeroMae;
    }

    public function getNumeroMae()
    {
        return $this->numeroMae;
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

    public function consultarGeral($filtro)
    {
        $conexao = new Conexao();
        $con = $conexao->getConnection();

        mysqli_select_db($con, 'sistema_controle');

        $sql = 'select * from novilhos where 1 = 1';

        if ($filtro != '') {
            if ($filtro['numeroBrinco']) {
                $sql .= " and numeroBrinco like '%" . $filtro['numeroBrinco'] . "%'";
            }

            if ($filtro['numeroPai']) {
                $sql .= " and numeroPai like '%" . $filtro['numeroPai'] . "%'";
            }

            if ($filtro['numeroMae']) {
                $sql .= " and numeroMae like '%" . $filtro['numeroMae'] . "%'";
            }

            if ($filtro['pesoInicial'] != '') {
                $sql .= " and peso >= " . $filtro['pesoInicial'];
            }

            if ($filtro['pesoFinal'] != '') {
                $sql .= " and peso <= " . $filtro['pesoFinal'];
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

    public function consultar()
    {
        $conexao = new Conexao();
        $con = $conexao->getConnection();

        mysqli_select_db($con, 'sistema_controle');

        $sql = 'select * from novilhos where id = ' . $this->getId();
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
            "insert into novilhos (numeroBrinco, numeroPai, numeroMae, data, peso) values ('" .
            $this->getNumeroBrinco() .
            "', '" .
            $this->getNumeroPai() .
            "', '" .
            $this->getNumeroMae() .
            "', '" .
            $this->getData() .
            "', '" .
            $this->getPeso() .
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
            "update novilhos set 
                numeroBrinco = '" .
            $this->getNumeroBrinco() .
            "', numeroPai = '" .
            $this->getNumeroPai() .
            "', numeroMae = '" .
            $this->getNumeroMae() .
            "', data = '" .
            $this->getData() .
            "', peso = '" .
            $this->getPeso() .
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
        $sql = 'delete from novilhos where id = ' . $this->getId();

        mysqli_query($con, $sql);

        mysqli_close($con);
    }
}
