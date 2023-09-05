@extends('layouts.master')

@section('contenu')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-4 mb-0">Confirmer la suppression</h3>
</div>
<div class="yt-2">
    <p>Êtes-vous sûr de vouloir supprimer l'étudiant {{ $etudiant->nom }} {{ $etudiant->prenom }} ?</p>
    <form method="POST" action="{{ route('etudiant.supprimer', $etudiant->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Voulez-vous vraiment supprimer cet étudiant ?')">Supprimer</button>
    </form>
        <a href="{{ route('etudiant') }}" class="btn btn-secondary">Annuler</a>
</div>
@endsection
