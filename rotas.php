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

    case "/logradouro/by-bairro":
        EnderecoController::getLogradouroByBairroAndCidade();
    break;

    case "/cep/by-logradouro":
        EnderecoController::getCepByLogradouro();
    break;

    case "/cidade/by-uf":
        EnderecoController::getCidadesByUf();
    break;

    case "/bairro/by-cidade":
        EnderecoController::getBairrosByIdCidade();
    break;

    default:
        http_response_code(403);
    break;
}

?>