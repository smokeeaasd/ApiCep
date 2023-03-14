<?php

namespace ApiCep\Model;

use EnderecoDAO;
use Exception;

class EnderecoModel extends Model
{
    public $id_logradouro, $tipo, $descricao, $id_cidade, $uf, $complemento,
        $descricao_sem_numero, $descricao_cidade, $codigo_cidade_ibge, $descricao_bairro;

    public $arr_cidades;

    public function getLogradouroByBairroAndCidade(string $bairro, int $id_cidade)
    {
        try
        {
            $dao = new EnderecoDAO();

            $this->rows = $dao->selectLogradouroByBairroAndCidade($bairro, $id_cidade);
        } catch (Exception $e)
        {
            throw $e;
        }
    }

    public function getCepByLogradouro($logradouro)
    {
        try
        {
            $dao = new EnderecoDAO();

            $this->rows = $dao->selectCepByLogradouro($logradouro);
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }
}