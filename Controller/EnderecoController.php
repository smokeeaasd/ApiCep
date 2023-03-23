<?php

namespace ApiCep\Controller;

use ApiCep\Model\EnderecoModel;
use ApiCep\Model\CidadeModel;

use Exception;

final class EnderecoController extends Controller
{
    public static function getCepByLogradouro() : void
    {
        try
        {
            $logradouro = $_GET['logradouro'];

            $model = new EnderecoModel();
            $model->getCepByLogradouro($logradouro);
            parent::getResponseAsJSON($model->rows);

        } catch (Exception $e) {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function getLogradouroByBairroAndCidade() : void
    {
        try
        {
            $bairro = parent::getStringFromUrl(
                isset($_GET['bairro']) ? $_GET['bairro'] : null, 'bairro'
            );

            $id_cidade = parent::getIntFromUrl(
                isset($_GET['id_cidade']) ? $_GET['id_cidade'] : null, 'cep'
            );

            $model = new EnderecoModel();

            $model->getLogradouroByBairroAndCidade($bairro, $id_cidade);

            parent::getResponseAsJSON($model->rows);

        } catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function getLogradouroByCep() : void
    {
        try
        {
            $cep = parent::getIntFromUrl(
                isset($_GET['cep']) ? $_GET['cep'] : null
            );

            $model = new EnderecoModel();

            parent::getResponseAsJSON($model->getLogradouroByCep($cep));

        } catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function getCidadesByUf() : void
    {
        try
        {
            $uf = $_GET['uf'];

            $model = new CidadeModel();

            $model->getCidadesByUf($uf);

            parent::getExceptionAsJSON($model->rows);
        } catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function getBairrosByIdCidade() : void
    {
        try
        {
            $id_cidade = parent::getIntFromUrl(
                isset($_GET['id_cidade']) ? $_GET['id_cidade'] : null);
            
                $model = new EnderecoModel();

                $model->getBairrosByIdCidade($id_cidade);

                parent::getResponseAsJSON($model->rows);
        }
        catch(Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }
}
