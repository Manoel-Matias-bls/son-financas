<?php

namespace SONFin\View;

use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response;

class ViewRenderer implements ViewRendererInterface
{


    /**
     * @var \Twig_Environment
     */
    private $twigEviroment;

    public function __construct(\Twig_Environment $twigEviroment)
    {

        $this->twigEviroment = $twigEviroment;
    }

    public function render(string $template, array $context = []): ResponseInterface
    {
        $result = $this->twigEviroment->render($template, $context);
        $response = new Response();
        $response->getBody()->write($result);
        return $response;
    }
}