<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarnetController extends Controller
{
    public function index(){
        return view('page.list_carnet');
    }
    public function create(){
        return view('page.ajout_carnet');
    }

    public function fiche_index(){
        return view('page.fiche_carnet');
    }
    public function fiche_create()
    {
        return view('page.fiche_list_saisie');
    }
}
