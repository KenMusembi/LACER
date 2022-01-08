<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ExcelContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {        
        return [
            'invoiceNo' => 936365,
            'stockCode' => '95123A',
            'description' => 'This a testing product',
            'quantity' => 3,
            'invoiceDate' => now(),
            'unitPrice' => 2.55,
            'customerID' => 17850,
            'country' => 'United Kingdom',
        ];
    }
}
