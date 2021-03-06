@extends('layouts/layout')

@section('title')
    Ajouter un tableau
@endsection

@section('content')
    <div class="card uper">
        <div class="card-header">
            Ajouter un tableau
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

            <form enctype="multipart/form-data" action="{{ route('pictures.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Nom du tableau</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>

                <div class="form-group">
                    <label for="price">Prix du tableau en &euro;</label>
                    <input type="text" class="form-control" name="price" id="price">
                </div>

                <div class="form-group">
                    <label for="comments">Commentaires</label>
                    <textarea class="form-control" name="comments" id="comments"></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Photo du tableau</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>

                <div class="buttons">
                    <button type="submit" class="btn btn-danger">Ajouter</button>
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
