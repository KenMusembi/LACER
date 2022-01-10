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
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Throwable;

class ExcelContentImport implements ToModel, WithHeadingRow,  
WithChunkReading, SkipsOnError , WithValidation, WithBatchInserts,
ShouldQueue, withEvents
{   
    use Importable, SkipsErrors, SkipsFailures, RegistersEventListeners;
    
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
           // '*.invoiceno' => ['string', 'unique:excel_contents,InvoiceNo']
        ];
    }    

    //chunck size
    public function chunkSize(): int{
        return 5000;
    }

    //batch size
    public function batchSize(): int{
        return 5000;
    }

    //event to be fired after import job
    public static function afterimport(AfterImport $event){
        //send notifications 
        return back()->withStatus("Excel file upload complete.");
    }
    

    //skip header row
    // public function startRow(): int
    // {
    //     return 2;
    // }

    // public function onFailure(Failure ...$failure){
    //     //return failure
    //     return back()->withStatus("Excel file not completely added.");
    // }

}
