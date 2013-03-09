<?php
namespace Model;

use Model\Api;

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
     * Converts to given amount from given currency to US currency
     * Returns the value in US currency
     *
     * @param string $currency
     * @param int $amount
     * @return double
     */
    public function convert($currency, $amount)
    {
        $rate = $this->api->getRate($currency);
        return $rate * $amount;
    }

    /**
     * Converts the amount given in string to US currency
     * String is expected in "{currency} {amount}" format
     * Returns the value in same string format
     *
     * @param string $amountStr
     * @return string
     */
    public function convertByString($amountStr)
    {
        $amountData = explode(' ', $amountStr); 
        $convertedValue = $this->convert($amountData[0], (double)$amountData[1]);

        return "USD $convertedValue";
    }

    /**
     * Converts the amounts given in string array to US currency
     * String is expected in "{currency} {amount}" format
     * Returns the value in same string format in array
     *
     * @param array $amountStr
     * @return array
     */
    public function convertByArray(array $amountList)
    {
        return array_map(function($amountString) {
            return $this->convertByString($amountString);
        }, $amountList);
    }

    /**
     * Returns the existing currencies
     *
     * @return array
     */
    public function getRates()
    {
        return $this->api->getAllRates();
    }
}
