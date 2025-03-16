<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConvertCurrencyRequest;
use App\Services\CurrencyService;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 * Currency Controller
 * 
 * @author Wang Pin Chen <r17369@gmail.com>
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
     * @OA\Post(
     *     path="/api/currency/convert",
     *     summary="Convert",
     *     description="Convert currency",
     *     tags={"Currency"},
     *     @OA\RequestBody(
     *       required=true,
     *       @OA\JsonContent(
     *         required={"from_currency", "to_currency", "amount"},
     *         @OA\Property(property="from_currency", type="string", description="The from currency", maxLength=3),
     *         @OA\Property(property="to_currency", type="string", description="The to currency", maxLength=3),
     *         @OA\Property(property="amount", type="number", description="The amount to convert"),
     *       )
     *     ),
     *     @OA\Response(
     *       response=200,
     *       description="Successful operation",
     *       @OA\JsonContent(
     *         required={"from_currency", "to_currency", "amount", "converted_amount", "rate"},
     *         @OA\Property(property="from_currency", type="string", example="USD", description="來源貨幣"),
     *         @OA\Property(property="to_currency", type="string", example="TWD", description="目標貨幣"),
     *         @OA\Property(property="amount", type="number", format="float", example=100, description="轉換的金額"),
     *         @OA\Property(property="converted_amount", type="number", format="float", example=3153, description="轉換後的金額"),
     *         @OA\Property(property="rate", type="number", format="float", example=31.5, description="匯率")
     *       )
     *     )
     * )
     * 
     * @param ConvertCurrencyRequest $convertCurrencyRequest
     * @return JsonResponse
     */
    public function convert(ConvertCurrencyRequest $convertCurrencyRequest): JsonResponse
    {
        try {
            $validated = $convertCurrencyRequest->validated();
            $result = $this->currencyService->convertCurrency($validated);

            return response()->json($result);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        }
    }
}
