@extends('layouts/layout')

@section('title')
    Liste des tableaux
@endsection

@section('content')
    <div>
        <a href="{{ route('pictures.create') }}" class="btn btn-success add">Ajouter un tableau</a>
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
            @forelse($pictures as $picture)
            <tr>
                <td>
                    <a href="{{ route('pictures.show', compact('picture')) }}" title="Afficher le tableau {{ $picture->name }}">
                        {{ $picture->name }}
                    </a>
                </td>
                <td>{{ $picture->comments ?? 'Pas de commentaire' }}</td>
                <td>{{ $picture->price }}</td>
                <td>
                    @if ($picture->path)
                        <img src="{{ asset($picture->getPath()) }}" title="Image tableau {{ $picture->name }}">
                    @else
                        Pas d'image pour ce tableau
                    @endif
                </td>
                <td>
                    <a href="{{ route('pictures.edit', compact('picture')) }}" class="btn btn-primary">Modifier</a>
                    <form action="{{ route('pictures.destroy', compact('picture')) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger top" type="submit">Supprimer</button>
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
<style>
    img {
        width: 40px;
        height: 40px;
    }

    .add {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .top {
        margin-top: 5px;
    }
</style>
@endsection

@section('javascript')

@endsection
