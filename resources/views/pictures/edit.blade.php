@extends('layouts/layout')

@section('title')
    Modifier un tableau
@endsection

@section('content')
    <div class="card uper">
        <div class="card-header">
            Modifier un tableau
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form enctype="multipart/form-data" action="{{ route('pictures.update', compact('picture')) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nom du tableau</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $picture->name }}">
                </div>

                <div class="form-group">
                    <label for="price">Prix du tableau en &euro;</label>
                    <input type="text" class="form-control" name="price" id="price" value="{{ $picture->price }}">
                </div>

                <div class="form-group">
                    <label for="comments">Commentaires</label>
                    <textarea class="form-control" name="comments" id="comments">{{ $picture->comments ?? '' }}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">Photo du tableau</label>
                    <input type="file" class="form-control" name="image" id="image">
                    @if ($picture->path)
                        <img src="{{ asset($picture->getPath()) }}" class="actual" title="image actuelle">
                    @endif
                </div>

                <div class="buttons">
                    <button type="submit" class="btn btn-danger">Modifier</button>
                    <a href="{{ url()->previous() }}" class="btn btn-primary back">Retour</a>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('styles')
<style>
    .uper {
        margin-top: 40px;
    }

    img.actual {
        margin: 10px auto;
        padding: 10px;
        border: 1px solid black;
        width: 100px;
        height: 100px;
    }

    .buttons {
        margin-top: 10px;
    }

    .back {
        margin-left: 10px;
    }
</style>
@endsection

@section('javascript')

@endsection
