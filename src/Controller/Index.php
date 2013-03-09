<?php
namespace Controller;

use Symfony\Component\HttpFoundation\Response;

/**
 *
 * @author Bora Tunca
 */
class Index
{
    /**
     * 
     */
    public function index()
    {
        $res = new Response();
        $res->setContent('HELLO SHIT');
        return $res;
    }
}
