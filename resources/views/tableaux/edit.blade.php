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

            <form enctype="multipart/form-data" action="{{ route('tableaux.update', ['tableaux' => $tableau]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nom du tableau</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $tableau->name }}">
                </div>

                <div class="form-group">
                    <label for="price">Prix du tableau en &euro;</label>
                    <input type="text" class="form-control" name="price" id="price" value="{{ $tableau->price }}">
                </div>

                <div class="form-group">
                    <label for="comments">Commentaires</label>
                    <textarea class="form-control" name="comments" id="comments">{{ $tableau->comments ?? '' }}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">Photo du tableau</label>
                    <input type="file" class="form-control" name="image" id="image">
                    @if ($tableau->path)
                        <img src="{{ asset('images/' . $tableau->path) }}" class="actual" title="image actuelle" width="100" height="100">
                    @endif
                </div>

                <button type="submit" class="btn btn-primary add">Modifier</button>
            </form>
        </div>
    </div>

@endsection

@section('styles')
<style>
    .uper {
        margin-top: 40px;
    }

    button.add {
        margin-top: 10px;
    }

    img.actual {
        margin: 10px auto;
    }
</style>
@endsection

@section('javascript')

@endsection
