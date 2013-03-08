<?php
namespace CurrencyConverter;

use CurrencyConverter\Rate\Repository as RateRepository;
use Buzz\Browser;

/**
 *
 * @author Bora Tunca
 */
class Api
{
    private $rateRepository;
    private $browser;

    /**
     * @param Browser $browser
     */
    public function __construct(RateRepository $rateRepository, Browser $browser)
    {    
        $this->rateRepository = $rateRepository;
        $this->browser = $browser;
    }

    /**
     *
     */
    public function getRate($currency)
    {
        $rate = $this->rateRepository->findOneByName($currency);
        return $rate->getValue();
    }

    /**
     *
     */
    public function refreshRates()
    {
        $response = $this->browser->get('http://toolserver.org/~kaldari/rates.xml');
        $response->getContent();
    }
}
 