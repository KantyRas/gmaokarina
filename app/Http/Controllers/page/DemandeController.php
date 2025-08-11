<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class DemandeController extends Controller
{
    public function index(){
        $donnees = collect([
            ['idDemande' => 1, 'description' => 'Demande A', 'idTypeDemande' => 'Achat', 'dateDemande' => '2025-08-11', 'statut' => 0],
            ['idDemande' => 2, 'description' => 'Demande B', 'idTypeDemande' => 'Sortie', 'dateDemande' => '2025-08-10', 'statut' => 1],
            ['idDemande' => 3, 'description' => 'Demande C', 'idTypeDemande' => 'Achat', 'dateDemande' => '2025-08-09', 'statut' => 2],
            ['idDemande' => 4, 'description' => 'Demande D', 'idTypeDemande' => 'Sortie', 'dateDemande' => '2025-08-08', 'statut' => 1],
            ['idDemande' => 5, 'description' => 'Demande E', 'idTypeDemande' => 'Achat', 'dateDemande' => '2025-08-07', 'statut' => 2],
            ['idDemande' => 6, 'description' => 'Demande F', 'idTypeDemande' => 'Sortie', 'dateDemande' => '2025-08-06', 'statut' => 0],
        ]);
        $page = request()->get('page', 1);
        $parPage = 3;
        $pagination = new LengthAwarePaginator(
            $donnees->forPage($page, $parPage),
            $donnees->count(),
            $parPage,
            $page,
            ['path' => url()->current()]
        );
        return view('maintenance.demande.list_demande',[
            'demandes' => $pagination
        ]);
    }
    public function create(){
        return view('maintenance.demande.form_demande');
    }
}
