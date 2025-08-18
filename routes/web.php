<?php

use App\Http\Controllers\admin\FonctionController;
use App\Http\Controllers\admin\EmplacementController;
use App\Http\Controllers\admin\EmployeController;
use App\Http\Controllers\admin\EquipementController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\TypeDemandeController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\page\CarnetController;
use App\Http\Controllers\page\DemandeController;
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

/* Administration */
Route::prefix('admin')->name('admin.personnel.')->group(function () {
    Route::resource('employe',EmployeController::class)->except(['show']);
    Route::resource('role',RoleController::class)->except(['show']);
    Route::resource('user',UserController::class)->except(['show']);
});

/* Demandes stocks (achats/sorties) */
Route::prefix('demandes')->name('demande.')->group(function () {
    Route::resource('typeDemande',TypeDemandeController::class)->except(['show']);
    Route::get('/', [DemandeController::class, 'index'])->name('liste_demande');
    Route::get('/create', [DemandeController::class, 'create'])->name('create_demande');
});
Route::prefix('carnets')->name('carnet.')->group(function () {
    Route::get('/',[CarnetController::class,'index'])->name('liste_carnet');
    Route::get('/fiche/historique',[CarnetController::class,'fiche_index'])->name('fiche_carnet');
    Route::get('/fiche/saisie',[CarnetController::class,'fiche_create'])->name('fiche_saisie');;
    Route::resource('fonction',FonctionController::class)->except(['show']);
    Route::resource('emplacement',EmplacementController::class)->except(['show']);
    Route::resource('equipement',EquipementController::class)->except(['show']);
});


