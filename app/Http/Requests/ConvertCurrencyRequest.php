<?php

namespace App\Http\Requests;

use App\Repositories\CurrencyRepository;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

/**
 * Convert Currency Request
 * This class is responsible for handling the validation of the convert currency request.
 * 
 * @author Wang Pin Chen <r17369@gmail.com>
 */
class ConvertCurrencyRequest extends FormRequest
{
    /**
     * Constructor
     * 
     * @param CurrencyRepository $currencyRepository
     * @return void
     */
    public function __construct(private CurrencyRepository $currencyRepository){}

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'from_currency' => 'required|string|size:3|isExist',
            'to_currency' => 'required|string|size:3|isExist',
            'amount' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,4})?$/', 'min:0'],
        ];
    }

    /**
     * Custom validation rules and messages
     * 
     * @param Validator $validator
     * @return array<string, string>
     */
    public function withValidator(Validator $validator)
    {
        $validator->addExtension('isExist', function ($attribute, $value, $parameters) {
            $currency = $this->currencyRepository->getByCode($value);

            return $currency !== null;
        });

        $validator->addReplacer('isExist', function ($message, $attribute, $rule, $parameters, $validator) {
            $value = $validator->getData()[$attribute];

            return "The currency code '{$value}' does not exist in our system.";
        });
    }
}
