<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConvertCurrencyRequest;
use App\Services\CurrencyService;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 * CurrencyController
 */
class CurrencyController extends Controller
{
    /**
     * Constructor
     * 
     * @param CurrencyService $currencyService
     * @return void
     */
    public function __construct(private CurrencyService $currencyService ){}

    /**
     * Convert currency
     * 
     * @return JsonResponse
     */
    public function convert(ConvertCurrencyRequest $convertCurrencyRequest): JsonResponse
    {
        try {
            
            // $validated = $this->convertCurrencyRequest->validated();
            // $result = $this->currencyService->convertCurrency($validated);
            var_dump(123);
            exit;

            return response()->json($result);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        }
    }
}
