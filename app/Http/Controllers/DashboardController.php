<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class DashboardController extends Controller
{
    //first 100 characters
    public function index(){        
        $offset = 0;
        
        //first 100 records    
        $marvel_characters = Http::get('https://gateway.marvel.com/v1/public/characters', 
                [
                'apikey'=> '79b29ec0804b795cf3be8ecb0985fdb5',
                'ts'=>1,
                'hash'=>'ffd4fa489d420f37f34e7c46be4632d3',
                'limit'=>10,
                'offset'=>$offset
                ]);  
                
        
            return view('dashboard' , 
            [
                'marvel_characters'=>$marvel_characters['data']['results'],            
                'marvel_characters_attribution'=>$marvel_characters,                                
            ])->with('offset', $offset);
        
    }

     //next 100 characters
     public function offset($offset){        
        $offset= $offset + 10;
        
        //first 100 records    
        $marvel_characters = Http::get('https://gateway.marvel.com/v1/public/characters', 
                [
                'apikey'=> '79b29ec0804b795cf3be8ecb0985fdb5',
                'ts'=>1,
                'hash'=>'ffd4fa489d420f37f34e7c46be4632d3',
                'limit'=>10,
                'offset'=>$offset
                ]);  
                
        
            return view('dashboard' ,
            [
            'marvel_characters'=>$marvel_characters['data']['results'],            
            'marvel_characters_attribution'=>$marvel_characters,
            
        ])->with('offset', $offset);
        
    }
   
}
