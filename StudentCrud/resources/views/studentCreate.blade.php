@extends('layouts.master')
@section('contenu')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-4 mb-0">Ajout d'un nouveau etudiant</h3>
            <div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">    
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="yt-2">
                    <form style="width: 50%" method="POST" action="{{route('etudiant.ajout')}}">
                        @csrf
                        <div class="mb-3">
                        <label for="nom" class="form-label">Nom de l'etudiant:</label>
                        <input type="text" name="nom" class="form-control"  >
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prenom de l'etudiant:</label>
                            <input type="text" name="prenom" class="form-control"  >
                        </div> 
                        <div class="mb-3">
                            <label for="classe" class="form-label">Classe:</label>
                            <select name="classe_id" class="form-control"  >
                                <option value=""></option>
                                @foreach ($classes as $classe)
                                <option value="{{$classe->id}}">{{$classe->libelle}}</option>    
                                @endforeach
                            </select>
                        </div>
                
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                        <a href="{{route('etudiant')}}" class="btn btn-danger">Annuler</a>
                    </form>
                </div>
            </div>
    </div>
@endsection

