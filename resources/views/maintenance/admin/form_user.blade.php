@extends('basefront')
@section('title','Ajout Utilisateur')
@section('content')
    <div class="col-lg-12">
        <h1 class="page-header">Nouveau utilisateur</h1>
    </div>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Formulaires Ajouts Utilisateurs
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="#">
                                @csrf
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Mot de passe</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>nº Matricule</label>
                                    <select class="form-control">
                                        <option>6906</option>
                                        <option>6907</option>
                                        <option>6908</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Rôle</label>
                                    <select class="form-control">
                                        <option value="1">Super admin</option>
                                        <option value="2">Admin</option>
                                        <option value="3">Simple utilisateur</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-outline btn-success" style="width:200px;">Validez</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
