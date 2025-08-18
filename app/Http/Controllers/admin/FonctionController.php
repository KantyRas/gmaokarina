<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FonctionController extends Controller
{
    public function index()
    {
        return view('maintenance.admin.entreprise.list_fonction');
    }
    public function create()
    {
        return view('maintenance.admin.entreprise.form_fonction');
    }
    public function store(Request $request)
    {
        //
    }
    public function edit(string $id)
    {
        //
    }
    public function update(Request $request, string $id)
    {
        //
    }
    public function destroy(string $id)
    {
        //
    }
}
