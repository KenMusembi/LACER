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
    //
    public function index(){
        //return the main index view
        return view('excelcontent.index');
    }

    //method to export excel data
    public function export(){
        //downloading the excel file
        return [
            (new ExcelContentExport),
        ];
       // return new ExcelContentExport;        
    }

    

    //method to import excel data
    public function show(){
        //downloading the excel file
        return view('excelcontent.index');    
    }

    //method to import excel data
    public function store(Request $request){
        //downloading the excel file
        $file = $request
        ->file('file')->store(
            
            'import'
        );
       // Storage::setVisibility('import/' . $file, 'private');
        //dd($file);
               
    
        
        (new ExcelContentImport)->import($file);

        return back()->withStatus("Excel file added to Job, refresh this 
        page to see added records.");
    }
}
 