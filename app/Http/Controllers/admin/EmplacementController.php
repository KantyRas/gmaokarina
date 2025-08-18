<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmplacementController extends Controller
{
    public function index()
    {
        return view('maintenance.admin.entreprise.list_emplacement');
    }
    public function create()
    {
        return view('maintenance.admin.entreprise.form_emplacement');
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
