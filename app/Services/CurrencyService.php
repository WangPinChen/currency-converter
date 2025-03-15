<?php

namespace App\Services;

use App\Repositories\CurrencyRepository;

/**
 * Currency Service
 * This class is responsible for handling currency conversion.
 * 
 * @author Wang Pin Chen <r17369@gmail.com>
 */
class CurrencyService
{
    /**
     * @var CurrencyRepository
     */
    protected $currencyRepo;

    /**
     * CurrencyService constructor
     * 
     * @param CurrencyRepository $currencyRepository
     * @return void
     */
    public function __construct(private CurrencyRepository $currencyRepository) {}

    /**
     * Convert currency
     * 
     * @param array<string, mixed> $params
     * @return array
     */
    public function convertCurrency(array $params): array
    {
        $fromCurrency = $params['from_currency'];
        $toCurrency = $params['to_currency'];
        $amount = $params['amount'];

        $rate = $this->currencyRepository->getExchangeRate($fromCurrency, $toCurrency);

        if ($rate === null) {
            return [
                'error' => 'Invalid currency pair'
            ];
        }

        $convertedAmount = $amount * $rate;

        return [
            'from_currency' => $fromCurrency,
            'to_currency' => $toCurrency,
            'amount' => $amount,
            'converted_amount' => $convertedAmount,
            'rate' => $rate,
        ];
    }   
}
