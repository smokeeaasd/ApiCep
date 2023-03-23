<?php

namespace ApiCep\Model;

use ApiCep\DAO\EnderecoDAO;

use Exception;

class EnderecoModel extends Model
{
    public $id_logradouro, $tipo, $descricao, $id_cidade, $uf, $complemento,
        $descricao_sem_numero, $descricao_cidade, $codigo_cidade_ibge, $descricao_bairro;

    public $arr_cidades;

    public function getLogradouroByBairroAndCidade(string $bairro, int $id_cidade)
    {
        try {
            $dao = new EnderecoDAO();

            $this->rows = $dao->selectLogradouroByBairroAndCidade($bairro, $id_cidade);
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function getLogradouroByCep($cep)
    {
        try {
            $dao = new EnderecoDAO();
            
            $this->rows = $dao->selectByCep($cep);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getCepByLogradouro($logradouro)
    {
        try {
            $dao = new EnderecoDAO();

            $this->rows = $dao->selectCepByLogradouro($logradouro);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function getBairrosByIdCidade(int $id_cidade)
    {
        try {
            $dao = new EnderecoDAO();

            $this->rows = $dao->selectBairrosByIdCidade($id_cidade);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
