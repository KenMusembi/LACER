<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    //
    public function index(){
            $marvel_characters = Http::get('https://gateway.marvel.com/v1/public/characters', 
                [
                'apikey'=> '79b29ec0804b795cf3be8ecb0985fdb5',
                'ts'=>1,
                'hash'=>'ffd4fa489d420f37f34e7c46be4632d3'
                ]);
            return view('dashboard' ,['marvel_characters'=>$marvel_characters['data']['results']]);
        
    }
   
}
