<?php

namespace App\Http;

/**
 * Classe responsável por gerenciar as requisições que estão chegando na nossa aplicação
 * Na instância dessa classe iremos armazenar todos os dados que o cliente da requisição enviou para a aplicação
 */
class Request {

    /**
     * Todos os dados que serão populados no momento da construção da requisição HTTP
     */
    public function __construct()
    {
        $this->queryParams  = $_GET ?? [];
        $this->postVars     = $_POST ?? [];
        $this->headers      = getallheaders();
        $this->httpMethod   = $_SERVER['REQUEST_METHOD'] ?? '';
        $this->uri          = $_SERVER['REQUEST_URI'] ?? '';
     }

    /**
     * Método HTTP usado para realizar a requisição.
     * @var string
    */
    private $httpMethod;

    /**
     * URI da página
     * @var string
    */
    private $uri;

    /**
     * Paramentros que são enviados ne GET da URL
     * Essencial para que o sistema saiba qual funcionalidade ou rota deve ser acionada com base na requisição.
     * @var array
     */
    private $queryParams = [];

    /**
     * Variáveis que são enviadas no POST da aplicação (dentro do body da requisição) ($_POST)
     * @var array
     */
    private $postVars = [];

    /**
     * Cabeçalho da requisição
     * @var array
     */
    private $headers = [];



    /**
     * Método responsável por retornar o método HTTP da requisição
     * @return string
    */
    public function getHttpMethod() {
        return $this->httpMethod;
    }

    /**
     * Método responsável por retornar a URI da requisição
     * @return string
    */
    public function getUri() {
        return $this->uri;
    }

    /**
     * Método responsável por retornar os headers da requisição
     * @return array
    */
    public function getHeaders() {
        return $this->headers;
    }

    /**
     * Método responsável por retornar os parametros da URL
     * @return array
    */
    public function getQueryParams() {
        return $this->queryParams;
    }

    /**
     * Método responsável por retornar as variaveis POST da requisição
     * @return array
    */
    public function getPostVars() {
        return $this->postVars;
    }

}