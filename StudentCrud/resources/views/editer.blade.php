@extends('layouts.master')

@section('contenu')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-4 mb-0">Éditer l'étudiant</h3>
</div>
<div class="yt-2">
    <form method="POST" action="{{ route('etudiant.update', $etudiant->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $etudiant->nom }}">
        </div>

        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $etudiant->prenom }}">
        </div>

        <div class="form-group">
            <label for="classe_id">Classe</label>
            <select class="form-control" id="classe_id" name="classe_id">
                @foreach ($classes as $classe)
                    <option value="{{ $classe->id }}" {{ $etudiant->classe_id == $classe->id ? 'selected' : '' }}>
                        {{ $classe->libelle }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Mettre à jour</button>
    </form>

    <!-- Vérifiez si l'étudiant n'a pas été mis à jour aujourd'hui pour afficher ou masquer le bouton Supprimer -->
    @if (!$etudiant->updated_at->isToday())
        <form method="POST" action="{{ route('etudiant.supprimer', $etudiant->id) }}" id="delete-form">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cet étudiant ?')">Supprimer</button>
        </form>
    @endif
</div>
@endsection
