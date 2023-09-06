@extends('layouts.app')

@section('content')
        <h2>Gestion Contacte</h2>
    <div class="row yt-2">
            <div class="d-flex justify-content-between">
                {{$contacts->links()}}
                <a class="btn btn-success mb-4" href="{{ url('contact/create') }}">Ajouter</a>    
            </div>
    </div>



    @if ($message = Session::get('success'))

        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>

    @endif



    <table class="table table-bordered">

        <tr>

            <th>No</th>
            <th>Nom Complet</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Salaire</th>
            <th>Actions</th>

        </tr>

        @foreach ($contacts as $index=>$contact)

            <tr>
                <td>{{ $index +1 }}</td>
                <td>{{ $contact->nomComplet }}</td>
                <td>{{ $contact->Email }}</td>
                <td>{{ $contact->telephone }}</td>
                <td>{{ $contact->Salaire }}</td>
                <td>

                    <form action="{{ url('contact/'. $contact->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <a class="btn btn-info" href="{{ url('contact/'. $contact->id) }}">Voir</a>
                        <a class="btn btn-primary" href="{{ url('contact/'. $contact->id .'/edit') }}">Modifier</a>

                        <button type="submit" class="btn btn-danger">Supprimer</button>

                    </form>
                </td>

            </tr>

        @endforeach
    </table>

@endsection
