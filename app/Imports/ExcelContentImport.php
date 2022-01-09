<?php

namespace App\Imports;

use App\Models\ExcelContent;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelContentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ExcelContent([
            //
            'invoiceNo' => $row[1],
            'stockCode' => $row[2],
            'description' => $row[3],
            'quantity' => $row[4],
            'invoiceDate' => $row[5],
            'unitPrice' => $row[6],
            'customerID' => $row[7],
            'country' => $row[8]
        ]);
    }

    //chunck size
    
}
