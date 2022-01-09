<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExcelContentExport;
use App\Imports\ExcelContentImport;
use Maatwebsite\Excel\Facades\Excel;

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
        return new ExcelContentExport;        
    }

    //method to import excel data
    public function show(){
        //downloading the excel file
        return view('excelcontent.index');    
    }

    //method to import excel data
    public function store(Request $request){
        //downloading the excel file
        $file = $request->file('file')->store('import');
        
        (new ExcelContentImport)->import($file);

        return back()->withStatus("Excel file imported succesfully!");
    }
}
 