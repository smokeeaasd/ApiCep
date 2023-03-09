<?php

namespace ApiCep\Model;

class EnderecoModel extends Model
{
    public $id_logradouro, $tipo, $descricao, $id_cidade, $uf, $complemento,
    $descricao_sem_numero, $descricao_cidade, $codigo_cidade_ibge, $descricao_bairro;
}
