@extends('basefront')
@section('title','Types demandes')
@section('content')
    <div class="col-lg-12">
        <h1 class="page-header">Les types de demandes</h1>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Listes
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Types</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="odd gradeX">
                                <td>1</td>
                                <td>Achats</td>
                                <td class="text-center">
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
                            <tr class="odd gradeX">
                                <td>1</td>
                                <td>Sorties</td>
                                <td class="text-center">
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Formulaires Ajouts
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="#">
                                @csrf
                                <div class="form-group">
                                    <label>Types</label>
                                    <input class="form-control" placeholder="...">
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
