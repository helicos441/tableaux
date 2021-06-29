@extends('layouts/layout')

@section('title')
    Liste des tableaux
@endsection

@section('content')
    <div>
        <a href="{{ route('tableaux.create') }}" class="btn btn-success">Ajouter un tableau</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Commentaires</th>
                <th scope="col">Prix TTC (€)</th>
                <th scope="col">Image</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse($tableaux as $tableau)
            <tr>
                <td>{{ $tableau->name }}</td>
                <td>{{ $tableau->comments ?? 'Pas de commentaire' }}</td>
                <td>{{ $tableau->price }}</td>
                <td>
                    @if ($tableau->path)
                        <img src="{{ asset('images/' . $tableau->path) }}" alt="Image tableau {{ $tableau->name }}" width="40" height="40">
                    @else
                        Pas d'image pour ce tableau
                    @endif
                </td>
                <td>
                    <a href="{{ route('tableaux.edit', ['tableaux' => $tableau]) }}" class="btn btn-primary">Modifier</a>
                    <form action="{{ route('tableaux.destroy', ['tableaux' => $tableau]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td>Pas de tableau à afficher</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection

@section('styles')

@endsection

@section('javascript')

@endsection
