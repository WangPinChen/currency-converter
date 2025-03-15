<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

/**
 * Convert Currency Request
 * This class is responsible for handling the validation of the convert currency request.
 * 
 * @author Wang Pin Chen <r17369@gmail.com>
 */
class ConvertCurrencyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'from_currency' => 'required|string|size:3',
            'to_currency' => 'required|string|size:3',
            'amount' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,4})?$/', 'min:0'],
        ];
    }
}
