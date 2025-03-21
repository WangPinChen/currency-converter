<?php

namespace App\Repositories;

use App\Models\Currency;

/**
 * CurrencyRepository
 * This class is responsible for handling currency data.
 * 
 * @author Wang Pin Chen <r17369@gmail.com>
 */
class CurrencyRepository
{
    /**
     *
     * @param string $fromCurrency
     * @param string $toCurrency
     * @return float|null
     */
    public function getExchangeRate(string $fromCurrency, string $toCurrency)
    {
        $currencies = Currency::getExchangeRates();

        foreach ($currencies as $currencyData) {
            if ($currencyData['base_currency'] === $fromCurrency) {
                if (isset($currencyData['rates'][$toCurrency])) {
                    return $currencyData['rates'][$toCurrency];
                }
                return null;
            }
        }

        return null;
    }

    /**
     * Get currency by code
     * 
     * @param string $code
     * @return array|null
     */
    public function getByCode(string $code): ?array
    {
        $currencies = Currency::getExchangeRates();

        foreach ($currencies as $currencyData) {
            if ($currencyData['base_currency'] === $code) {
                return $currencyData;
            }
        }

        return null;
    }
}
