<?php

namespace App\Http;

/**
 * Classe responsável por enviar a resposta HTTP para o cliente.
 */
class Response
{
    /**
     * Método responsável por iniciar a classe e definir os valores
     * @param integer $httpCode
     * @param mixed   $content
     * @param string  $contentType
     */
    public function __construct($httpCode, $content, $contentType = 'text/html')
    {
        $this->httpCode = $httpCode;
        $this->content  = $content;
        $this->setContentType($contentType);
    }

    /**
     * Código do status HTTP da resposta. Por padrão, iremos manter o status 200 (sucesso)
     * @var integer
     */
    private $httpCode = 200;

    /**
     * Cabeçalho da resposta HTTP
     *
     * @var array
     */
    private $headers = [];

    /**
     * Tipo de conteúdo que está sendo retornado na resposta HTTP. Por padrão, definimos como text/html 
     * @var string
     */
    private $contentType = 'text/html';

    /**
     * Conteúdo da resposta HTTP. 
     * @var mixed
     */
    private $content;

    /**
     * Método responsável por alterar o tipo de conteúdo do cabeçalho da resposta HTTP
     * @param string $contentType
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
        $this->addHeader('Content-type', $contentType);
    }

    /**
     * Método responsável por adicionar um registro no cabeçalho de response
     * @param string $key
     * @param string $value
     */
    private function addHeader($key, $value)
    {
        $this->headers[$key] = $value;
    }

    /**
     * Método responsável por enviar os headers para o navegador.
     * Preparar a resposta do servidor com informações extras.
     * Controlam o comportamento da comunicação entre cliente e servidor.
     */
    private function sendHeaders() 
    {
        // status
        http_response_code($this->httpCode);

        // enviar headers
        foreach ($this->headers as $key => $value) {
            header($key.': '.$value);
        }
    }

    /**
     * Método responsável por enviar a resposta para o usuário
    */
    public function sendResponse() {
        
        // envia os headers para o cliente (navegador)
        $this->sendHeaders();

        // imprime o conteúdo da requisição (resposta gerada pela requisição realizada)
        switch ($this->contentType) {
            case 'text/html':
                echo $this->content;
                break;    
        }
    }
}
