<?php
namespace CurrencyConverter;

use Buzz\Browser as BuzzBrowser;

/**
 *
 * @author Bora Tunca
 */
class Api
{
    private $browser;

    /**
     * @param BuzzBrowser $browser
     */
    public function __construct(BuzzBrowser $browser)
    {    
        $this->browser = $browser;
    }

    /**
     *
     */
    public function refreshRates()
    {
        $response = $this->browser->get('http://toolserver.org/~kaldari/rates.xml');
    }

    /**
     *
     */
    public function getRate()
    {
        return 1001;
    }
}
 