<?php
namespace Controller;

use Model\CurrencyConverter;
use Symfony\Component\HttpFoundation\Response;

/**
 *
 * @author Bora Tunca
 */
class Index
{
    private $currencyConverter;
    private $twig;

    /**
     * @param 
     */
    public function __construct(CurrencyConverter $currencyConverter, \Twig_Environment $twig)
    {    
        $this->currencyConverter = $currencyConverter;
        $this->twig = $twig;
    }

    /**
     * 
     */
    public function index()
    {
        $content = $this->twig->render('index.html.twig', array('name' => 'Fabien'));
        return new Response($content);
    }
}
