@extends('tasks-view.app')

@section('content')

<a href="{{route('create')}}" class= "btn btn-primary">Ajouter une tache</a>
    <table class="table">

        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td scope="row"></td>
                <td>Tache 1</td>
                <td>Description tache 1</td>
                <td>
                    <span class="badge text-bg-success">Terminé</span>
                </td>
                <td>
                    <a href="#" class="btn btn-info">Modifier</a>
                    <a href="#" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>

        </tbody>

    </table>
@endsection
