@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <form method="POST" action="{{ route('admin.posts.update', $post->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Immagine</label>
                    <input type="text" class="form-control" id="image" name="image" value="{{ $post->image }}">
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Contenuto</label>
                    <textarea class="form-control" id="body" name="body" rows="3">{{ $post->body }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Autore</label>
                    <input type="text" class="form-control" id="author" name="author" value="{{ $post->author }}">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success">Modifica</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection