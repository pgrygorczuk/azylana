<?php

use App\Models\Building;
use App\Models\BuildingVillage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VillageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    // return view('auth.login');
    return view('auth.register');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/unlock/{buildingvillage}', [VillageController::class, 'unlock']);
    Route::get('/build/{buildingvillage}/{building}', [VillageController::class, 'build']);
    Route::get('/village/{village:id?}', [VillageController::class, 'index']);

});
