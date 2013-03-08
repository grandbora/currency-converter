<?php
namespace CurrencyConverter;

use Buzz\Browser;

/**
 *
 * @author Bora Tunca
 */
class Api
{
    private $browser;

    /**
     * @param Browser $browser
     */
    public function __construct(Browser $browser)
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
        //pass repository
    }
}
 