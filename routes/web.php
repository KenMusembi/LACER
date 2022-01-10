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

//first we redirect the main  / route after login to excel content
Route::redirect('/', '/excelcontent');

//route for getting viewing, importing and exporting excel content
Route::get('/excelcontent', [Controllers\ExcelContentController::class, 'index'])
->name('excelcontent.index');

//route for exporting excel contents
Route::get('/excelcontent/export', [Controllers\ExcelContentController::class, 'export'])
->name('excelcontent.export');

//route for importing excel contents
Route::get('/excelcontent/import', [Controllers\ExcelContentController::class, 'show'])
->name('excelcontent.show');
Route::post('/excelcontent/import', [Controllers\ExcelContentController::class, 'store'])
->name('excelcontent.store');

//route for getting first 100 characters
Route::get('/dashboard', [Controllers\DashboardController::class, 'index'])
->name('dashboard');

//route for paginating through marvel characters
Route::get('/dashboard/offset/{offset?}', [Controllers\DashboardController::class, 'offset'])
->name('dashboard');

require __DIR__.'/auth.php';
