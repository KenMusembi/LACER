<?php

namespace App\Imports;

use App\Models\ExcelContent;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithValidation;
use Throwable;

class ExcelContentImport implements ToModel, WithHeadingRow,  WithChunkReading, SkipsOnError , WithValidation
{   
    use Importable, SkipsErrors;
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    public function model(array $row)
    {
        //testing to see the array returned
        //dd($row);
        return new ExcelContent([
            //
            'invoiceNo' => $row['invoiceno'],
            'stockCode' => $row['stockcode'],
            'description' => $row['description'],
            'quantity' => $row['quantity'],
            'invoiceDate' => $row['invoicedate'],
            'unitPrice' => $row['unitprice'],
            'customerID' => $row['customerid'],
            'country' => $row['country']
        ]);
    }
    
    //
    public function rules(): array{
        return [
            '*.invoiceno' => ['integer', 'unique:excel_contents,InvoiceNo']
        ];
    }    

    //chunck size
    public function chunkSize(): int{
        return 5000;
    }

    //skip header row
    // public function startRow(): int
    // {
    //     return 2;
    // }

}
