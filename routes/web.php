<?php

use App\Http\Controllers\admin\BatimentController;
use App\Http\Controllers\admin\DepartementController;
use App\Http\Controllers\admin\EmployeController;
use App\Http\Controllers\admin\EquipementController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('basefront');
})->name('index.dashboard');

Route::prefix('admin')->name('admin.personnel.')->group(function () {
    Route::resource('employe',EmployeController::class)->except(['show']);
    Route::resource('role',RoleController::class)->except(['show']);
    Route::resource('user',UserController::class)->except(['show']);
});
Route::prefix('admin')->name('admin.entreprise.')->group(function () {
    Route::resource('batiment',BatimentController::class)->except(['show']);
    Route::resource('departement',DepartementController::class)->except(['show']);
    Route::resource('equipement',EquipementController::class)->except(['show']);
});
