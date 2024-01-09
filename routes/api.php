<?php

use App\Http\Controllers\BukuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// bisa pakai cara ini
// Route::get('view_list_buku', [BukuController::class, 'index']);
// Route::post('view_list_buku', [BukuController::class, 'store']);
// Route::get('view_list_buku/{id}', [BukuController::class, 'show']);
// Route::put('view_list_buku/{id}', [BukuController::class, 'update']);
// Route::delete('view_list_buku/{id}', [BukuController::class, 'destroy']);

// atau
Route::resource('view_list_buku', BukuController::class);
