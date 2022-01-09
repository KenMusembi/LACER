<?php

namespace App\Exports;

use App\Models\ExcelContent;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExcelContentExport implements FromCollection, Responsable
{
    use Exportable;

    private $fileName = "stock_invoice.csv";//change to csv later after reading the doc
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ExcelContent::all();
    }
}
