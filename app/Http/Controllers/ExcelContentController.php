<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExcelContentExport;
use App\Imports\ExcelContentImport;
use App\Models\ExcelContent;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ExcelContentController extends Controller
{    
    public function index(){
        //return the main index view
        return view('excelcontent.index');
    }

    //method to download the excel file
    public function export(){
        
        return [
            (new ExcelContentExport),
        ];               
    }

    
    //method to show import page
    public function show(){
        //downloading the excel file
        return view('excelcontent.index');    
    }

    //method to import excel data
    public function store(Request $request){
        //downloading the excel file
        $file = $request
        ->file('file')->store('import');                      
        
        //importing the file
        (new ExcelContentImport)->import($file);

        return back()->withStatus("Excel file added to Job, refresh this 
        page to see added records.");
    }
}
 