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
            'invoiceNo' => 936367,
            'stockCode' => '95123B',
            'description' => 'This a second testing product',
            'quantity' => 6,
            'invoiceDate' => now(),
            'unitPrice' => 1.55,
            'customerID' => 17850,
            'country' => 'United Kingdom',
        ];
    }
}
