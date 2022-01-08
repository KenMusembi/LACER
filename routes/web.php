<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

$marvel_characters_response = Http::get('https://gateway.marvel.com/v1/public/characters', 
[
    'apikey'=> '79b29ec0804b795cf3be8ecb0985fdb5',
    'ts'=>1,
    'hash'=>'ffd4fa489d420f37f34e7c46be4632d3'
]);

    //test whether the api returns data
    //print_r($marvel_characters_response->json());
    //yes it does, api works with given query parameters