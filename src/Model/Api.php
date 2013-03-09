<?php
namespace Model;

use Model\Rate\Repository as RateRepository;
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
     * @return array
     */
    public function getCurrencyList()
    {
    }

    /**
     *
     * @param string $currency
     * @return double
     */
    public function getRate($currency)
    {
        $rate = $this->rateRepository->findOneByName($currency);
        if (null === $rate) {
            throw new \InvalidArgumentException("Currency \"$currency\" does not exist.");
        }

        return $rate->getValue();
    }

    /**
     *
     */
    public function refreshRates()
    {
        $response = $this->browser->get('http://toolserver.org/~kaldari/rates.xml');
        $response = new \SimpleXMLElement($response->getContent());

        foreach ($response->conversion as $conversion) {
            $this->rateRepository->insertOrUpdate($conversion->currency, $conversion->rate);
        }
    }
}
