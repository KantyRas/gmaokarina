<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class DemandeController extends Controller
{
    public function index(){

        return view('maintenance.demande.list_demande');
    }
    public function create(){
        return view('maintenance.demande.form_demande');
    }
}
