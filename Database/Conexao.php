<?php
class Conexao
{
    public function getConnection()
    {
        $connection = mysqli_connect('127.0.0.1', 'root', '');

        return $connection;
    }
}
