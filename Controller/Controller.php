<?php

namespace ApiCep\Controller;

use Exception;

abstract class Controller
{
    public static function getResponseAsJSON($data)
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=utf-8");
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Pragma: public");

        exit(json_encode($data));
    }

    public static function getExceptionAsJSON(Exception $e)
    {

        $exception = [
            'message' => $e->getMessage(),
            'code' => $e->getCode(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'traceAsString' => $e->getTraceAsString(),
            'previous' => $e->getPrevious()
        ];

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=utf-8");
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Pragma: public");

        http_response_code(400);

        exit(json_encode($exception));

    }

    public static function isGet()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET')
            throw new Exception("O método de requisição deve ser GET");   
    }

    public static function isPost()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
           throw new Exception("O método de requisição deve ser GET");
    }
}
?>