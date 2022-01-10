<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class DashboardController extends Controller
{
    
    //method index loads first 100 characters
    public function index(){          
         /*
        offset  is the value by which characters will be skipped,    
        the goal is to increament this to loop over the various pages
        */
        $offset = 0;
               
        //the variable to hold all the marvel characters fetched
        $marvel_characters = Http::get('https://gateway.marvel.com/v1/public/characters', 
        [
        'apikey'=> '79b29ec0804b795cf3be8ecb0985fdb5',
        'ts'=>1,
        'hash'=>'ffd4fa489d420f37f34e7c46be4632d3',
        'limit'=>10,
        'offset'=>$offset
        ]);   
            /*
            had to test to see the results we coming in well, got code 200, hooray
            dd($marvel_characters['code']);
            */

        //show the dashboard page with marvel characters, and the attribution text required by marvel    
            return view('dashboard' , 
                [   
                    //the array in results has the data we are most interested in
                    'marvel_characters'=>$marvel_characters['data']['results'],            
                    'marvel_characters_attribution'=>$marvel_characters,                                
                ])->with('offset', $offset);
        
    }

     //now we change the offset to load 10 more results
     public function offset($offset){        
        $offset= $offset + 10;

        //incase we reach to the last page
        if($offset == 156){
            $offset = 0;
        }
        
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
