@extends('basefront')
@section('title', "Demandes en cours")
@section('content')
    <div class="col-lg-12">
        <h1 class="page-header">Vos demandes en cours</h1>
        <div class="text-right" style="margin-bottom:15px;">
            <a href="{{ route('demande.create_demande') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Nouvelle demande
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Listes des demandes
                </div>
                <div class="panel-body">
                    <div class="text-right" style="margin-bottom:10px;">
                        <input type="text" id="searchInput" class="form-control" placeholder="Rechercher..." style="width: 250px; display: inline-block;">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Description</th>
                                <th>Type</th>
                                <th>Date</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($demandes as $demande)
                                <tr class="odd gradeX">
                                    <td>{{ $demande['idDemande'] }}</td>
                                    <td>{{ $demande['description'] }}</td>
                                    <td>{{ $demande['idTypeDemande'] }}</td>
                                    <td>{{ $demande['dateDemande'] }}</td>
                                    <td>@include('shared.status', ['status' => $demande['statut']])</td>
                                    <td class="text-center">
                                        <a href="#"
                                           class="btn btn-primary btn-circle"
                                           title="Détails">
                                            <i class="fa fa-file"></i>
                                        </a>
                                        <a href="#"
                                           class="btn btn-success btn-circle"
                                           title="Modifier">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="" method="POST" style="display:inline-block; margin-left:3px;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-danger btn-circle"
                                                    title="Supprimer">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-right">
        {{ $demandes->links() }}
    </div>
    <script src="{{ asset('js/table-utils.js') }}"></script>
@endsection
