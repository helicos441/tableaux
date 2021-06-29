@extends('layouts/layout')

@section('title')
    Tableau {{ $picture->name}}
@endsection

@section('content')
    <a href="{{ route('pictures.index') }}" class="btn btn-danger">Retour à la liste</a>

    <div class="card uper">
        <div class="card-header">
            {{ $picture->name }} - {{ $picture->price }} &euro;
            <a href="{{ route('pictures.edit', compact('picture')) }}" class="btn btn-sm btn-primary">Modifier</a>
        </div>
        <div class="card-body">
                @if ($picture->comments)
                    <div class="comments">Commentaires: {{ $picture->comments }}</div>
                @endif

                <div class="image">
                    @if ($picture->path)
                        <img src="{{ asset($picture->getPath()) }}" title="image actuelle">
                    @else
                        Aucune image associée au tableau.
                    @endif
                </div>
        </div>
    </div>

@endsection

@section('styles')
<style>
    .uper {
        margin-top: 40px;
    }

    .image {
        margin: 10px auto;
    }

    img {
        margin: 10px auto;
        border: 1px solid black;
        padding: 10px;
        width: 200px;
        height: 200px;
    }
</style>
@endsection

@section('javascript')

@endsection
