<?php
namespace CurrencyConverter;

use CurrencyConverter\Api;

/**
 *
 * @author Bora Tunca
 */
class CurrencyConverter
{
    private $api;

    /**
     *
     * @param Api $api
     */
    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    /**
     *
     * @param string $currency
     * @param int $amount
     * @return double
     */
    public function convertToUSCurrency($currency, $amount)
    {
        $rate = $this->api->getRate($currency);
        return $rate * $amount;
    }
}
