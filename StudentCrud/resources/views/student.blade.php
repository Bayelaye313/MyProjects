@extends('layouts.master')

@section('contenu')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-4 mb-0">Bienvenue dans notre Application</h3>
</div>
<div class="yt-2">
    <div class="d-flex justify-content-between">
        {{$etudiants->links()}}
        <a href="{{ route('etudiant.create') }}" class="btn btn-outline-primary mb-4">Ajouter un nouvel étudiant</a>
    </div>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Classe</th>
                <th scope="col">Actions</th> 
            </tr>
        </thead>
        <tbody>
            @foreach ($etudiants as $etudiant)
            <tr>
                <th scope="row">{{$loop->index+1}}</th>
                <td>{{$etudiant->nom}}</td>
                <td>{{$etudiant->prenom}}</td>
                <td>{{$etudiant->classe->libelle}}</td>
                <td class="d-flex"> 
                    <a href="{{ route('etudiant.edit', $etudiant->id) }}" class="btn btn-outline-info me-2">Éditer</a> 
                    <form method="POST" action="{{ route('etudiant.supprimer', $etudiant->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Voulez-vous vraiment supprimer cet étudiant ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
