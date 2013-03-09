<?php
namespace Controller;

use Model\Api;
use Symfony\Component\HttpFoundation\Response;

/**
 *
 * @author Bora Tunca
 */
class Index
{
    private $api;
    private $twig;

    /**
     * @param 
     */
    public function __construct(Api $api, \Twig_Environment $twig)
    {    
        $this->api = $api;
        $this->twig = $twig;
    }

    /**
     * 
     */
    public function index()
    {
        $currencyList = $this->api->getAllRates();

        $content = $this->twig->render('index.html.twig',
            array('currencyList' => $currencyList));
        return new Response($content);
    }
}
