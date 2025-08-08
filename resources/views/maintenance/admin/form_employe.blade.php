@extends('basefront')
@section('title','Ajout Employé')
@section('content')
    <div class="col-lg-12">
        <h1 class="page-header">Employés</h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Formulaires Ajouts Employés
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form action="#">
                            @csrf
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input class="form-control" placeholder="Entrez le nom">
                                </div>
                                <div class="form-group">
                                    <label>Prénom</label>
                                    <input class="form-control" placeholder="Entrez le prénom">
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">Nº</span>
                                    <input type="text" class="form-control" placeholder="Matricule">
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="email" class="form-control" placeholder="ex: rakoto@gmail.com">
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">+261</span>
                                    <input type="tel" class="form-control" placeholder="ex: 348945621">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Département</label>
                                    <input type="text" class="form-control" placeholder="Nom département">
                                </div>
                                <div class="form-group">
                                    <label>Fonction</label>
                                    <input class="form-control" placeholder="Poste occupé">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-outline btn-success" style="width:200px;">Validez</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
