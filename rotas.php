<?php

use ApiCep\Controller\EnderecoController;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($uri)
{
    /**
     * [OK] Exemplo de acesso: https://cep.metoda.com.br/endereco/by-cep?cep=17300000
     */
    case "/endereco/by-cep":
        EnderecoController::getLogradouroByCep();
    break;

    case "/cidades/by-uf":
        EnderecoController::getCidadesByUf();
    break;
}

?>