<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'base_currency', 
        'last_updated', 
        'rates',
    ];

    /**
     * The attributes that should be cast to native types.
     * 
     * @var array
     */
    protected $casts = [
        'rates' => 'array',
    ];

    /**
     * Get the exchange rates.
     * 
     * @return array
     */
    public static function getExchangeRates()
    {
        return [
            [
                "base_currency" => "USD",
                "last_updated" => "2023-12-25T12:00:00Z",
                "rates" => [
                    "USD" => 1.0000,
                    "TWD" => 31.5000,
                    "JPY" => 148.5000,
                ],
            ],
            [
                "base_currency" => "TWD",
                "last_updated" => "2023-12-25T12:00:00Z",
                "rates" => [
                    "USD" => 0.0317,
                    "TWD" => 1.0000,
                    "JPY" => 4.7143,
                ],
            ],
            [
                "base_currency" => "JPY",
                "last_updated" => "2023-12-25T12:00:00Z",
                "rates" => [
                    "USD" => 0.00673,
                    "TWD" => 0.2121,
                    "JPY" => 1.0000,
                ],
            ]
        ];
    }
}