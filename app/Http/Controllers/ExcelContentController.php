<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExcelContentController extends Controller
{
    //
    public function index(){
        //$excel_content = ExcelContent::where('id', 1)->latest()->get();
        
        //test if data is being returned
        //return $excel_content;

        //return the actual blade file
        //return view('livewire.excel-content-table', compact('excel_content'));
        return view('excelcontent.index');
    }
}
