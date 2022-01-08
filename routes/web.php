<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::redirect('/', '/excelcontent');

Route::get('/excelcontent', [Controllers\ExcelContentController::class, 'index'])
->name('excelcontent.index');

$marvel_characters_response = Http::get('https://gateway.marvel.com/v1/public/characters', 
[
    'apikey'=> '79b29ec0804b795cf3be8ecb0985fdb5',
    'ts'=>1,
    'hash'=>'ffd4fa489d420f37f34e7c46be4632d3'
]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
